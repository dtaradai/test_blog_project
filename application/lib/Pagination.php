<?php

namespace application\lib;

class Pagination {
    
    private $max = 10;
    private $route;
    private $current_page;
    private $total;
    private $limit;
    private $amount;

    public function __construct($route, $total, $limit = 10) {
        $this->route = $route;
        $this->total = $total;
        $this->limit = $limit;
        $this->amount = $this->amount();
        $this->setCurrentPage();
    }
   
    public function get() {
        $links = null;
        $limits = $this->limits();
        $html = '<div class="pagination__container center"><div class="pagination">';
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            if ($page == $this->current_page) {
                $links .= '<a class="active" >' . $page . '</a>';
            } else {
                $links .= $this->generateHtml($page);
            }
        }
        if (!is_null($links)) {
            if ($this->current_page > 1) {
                $links = $this->generateHtml(1, '<<').$links;
            }
            if ($this->current_page < $this->amount) {
                $links .= $this->generateHtml($this->amount, '>>');
            }
        }
        $html .= $links.' </div></div>';
        return $html;
    }

    private function generateHtml($page, $text = null) {
        if (!$text) {
            $text = $page;
        }
        return '<a href="/'.$this->route['controller'].'/'.$this->route['action'].'/'.$page.'">'.$text.'</a>';
    }

    private function limits() {
        $left = $this->current_page - round($this->max / 2);
        $start = $left > 0 ? $left : 1;
        if ($start + $this->max <= $this->amount) {
            $end = $start > 1 ? $start + $this->max : $this->max;
        }
        else {
            $end = $this->amount;
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return array($start, $end);
    }

    private function setCurrentPage() {
        if (isset($this->route['page'])) {
            $currentPage = $this->route['page'];
        } else {
            $currentPage = 1;
        }
        $this->current_page = $currentPage;
        if ($this->current_page > 0) {
            if ($this->current_page > $this->amount) {
                $this->current_page = $this->amount;
            }
        } else {
            $this->current_page = 1;
        }
    }

    private function amount() {
        return ceil($this->total / $this->limit);
    }
}