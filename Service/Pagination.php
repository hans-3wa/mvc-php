<?php

namespace App\Service;

class Pagination {
    private int $current;
    private array $datasets;
    private int $maxPerPage;

    /**
     * @param int $current
     * @param array $datasets
     * @param int $maxPerPage
     */
    public function __construct(array $datasets, int $maxPerPage, int $current = 0)
    {
        $this->current = $current;
        $this->datasets = $datasets;
        $this->maxPerPage = $maxPerPage;
    }

    /**
     * @return int
     */
    public function getCurrent(): int
    {
        return $this->current;
    }

    /**
     * @return array
     */
    public function getDatasets(): array
    {
        return $this->datasets;
    }

    /**
     * @return int
     */
    public function getMaxPerPage(): int
    {
        return $this->maxPerPage;
    }

    /**
     * @param int $current
     */
    public function setCurrent(int $current): void
    {
        $this->current = $current;
    }

    public function getPagesCount() :int
    {
        $len = count($this->datasets);
        $c = $len / $this->maxPerPage;

        if($c < 0){
            return 1;
        } else {
            // 3.4 -> 3
            if(round($c) < $c){
                return  round($c) +1;
            } else { // 3.5 -> 4
                return round($c);
            }
        }
    }


    public function getDatasetByPage(int $page = -1): array
    {
        $currentPage = $page === -1 ? $this->current : $page;

        // currentPage = 2, maxPerPage = 2
        // currentPage * maxPerPage = 4
        $currentPlaceInArray = $currentPage * $this->maxPerPage;
        return array_slice($this->datasets, $currentPlaceInArray, $this->maxPerPage);
    }

    public function getLinks(string $url): string
    {
        $links = "";
        $have = strpos($url, "?") ? "?" : "&";
        for ($i = 0; $i < floor($this->getPagesCount()); $i++){
            if($i === $this->current){
                $links .= "<a class='pageination-link btn' style='
                background: rgba(255, 255, 255, 0.801);
                color: #a18758;
                padding: 10px 30px 6px 30px;
                border-bottom: 4px solid #a18758;
                transform: scale(1.05, 1.05);'
                href='$url".$have."page=$i'> $i </a>";

            } else {
                $links .= "<a class='pageination-link btn' href='$url".$have."page=$i'> $i </a>";
            }
        }
        return "<div class='gallery'>". $links."</div>";
    }

}