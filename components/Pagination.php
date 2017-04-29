<?php

    class Pagination
    {

        private $max = 5;

        private $index = 'page';

        private $current_page;

        // общее кол-во записей
        private $total;

        // кол-во записей на 1 страницу
        private $limit;


        private $amount;

        public function __construct($total, $current_page, $limit, $index)
        {
            $this->total = $total;

            $this->limit = $limit;

            $this->index = $index;

            // установка кол-ва страниц
            $this->amount = $this->amount();

            // установка номера текущей страницы
            $this->setCurrentPage($current_page);
        }

        public function get()
        {
            // Для записи ссылок
            $links = null;

            // Ограничение для цикла
            $limits = $this->limits();

            $html = '<ul class="pagination">';

            // Генерируем ссылки
            for($page = $limits[0]; $page <= $limits[1]; $page++){
                // если текущая страница, ссылки нет и добавляется класс active
                if($page == $this->current_page){
                    $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
                } else {
                    // иначе генерируем ссылку
                    $links .= $this->generateHtml($page);
                }
            }

            // если ссылки создались
            if(!is_null($links)){
                // если текущая стр не первая
                if($this->current_page > 1){
                    // создаём ссылку на первую
                    $previous_page = $this->current_page - 1;
                    $links = $this->generateHtml($previous_page, '&lt') . $links;
                }

                // если текущая стр не первая
                if($this->current_page < $this->amount){
                    // создайм ссылку на последнюю
                    $next_page = $this->current_page + 1;
                    $links .= $this->generateHtml($next_page, '&gt');
                }
            }

            $html .= $links . '</ul>';

            //возвращаем html
            return $html;
        }

        private function generateHtml($page, $text = null)
        {
            // Если текст ссылки не указан
            if(!$text){
                // указываем что текст - цифра страницы
                $text = $page;
            }

            $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
            $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
            // формируем html ссылки и возвращаем
            return '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
        }

        private function limits()
        {
            // Вычисляем ссылки слева (чтобы активная ссылка была посередине)
            $left = $this->current_page - round($this->max / 2);

            // Вычисляем начало отсчёта
            $start = $left > 0 ? $left : 1;

            // Если впереди есть как минимум $this->max страниц
            if ($start + $this->max <= $this->amount)
                // Назначаем конец цикла вперёд на $this->max страниц или просто на минимум
                $end = $start > 1 ? $start + $this->max : $this->max;
            else {
                // Конец - общее количество страниц
                $end = $this->amount;

                // Начало - минус $this->max от конца
                $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
            }

            // Возвращаем
            return array($start, $end);
        }


        private function setCurrentPage($currentPage)
        {
            // Получаем номер страницы
            $this->current_page = $currentPage;

            // Если текущая страница боле нуля
            if ($this->current_page > 0) {
                // Если текунщая страница меньше общего количества страниц
                if ($this->current_page > $this->amount)
                    // Устанавливаем страницу на последнюю
                    $this->current_page = $this->amount;
            } else
                // Устанавливаем страницу на первую
                $this->current_page = 1;
        }

        // общее число страниц
        private function amount()
        {
            // Делим и возвращаем
            return ceil($this->total / $this->limit);
        }
    }