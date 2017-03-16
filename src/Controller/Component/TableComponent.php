<?php
namespace App\Controller\Component;

use Cake\Collection\Collection;
use Cake\Controller\Component;
use Cake\I18n\Date;
use Cake\View\Helper\HtmlHelper;

class TableComponent extends Component
{
    public function makeTable($data)
    {
        $str = ' <table id="example1" class="table table-bordered table-striped"><thead><tr><th>Students</th>';
        $sorted = $this->parseMarksDates($data);
        foreach ($sorted as $key) {
            $str .= '<th>' . $key . '</th>';
        }
        $str .= '</tr></thead><tbody>';
        foreach ($data as $student) {
            $str .= '<tr><td>' . $student->name . '</td>';
            foreach ($sorted as $date) {
                if ($mark = $this->getMark($student->marks,$date)) {
                    $str .= '<td><a href="/marks/edit/' . $mark[1] . '">' . $mark[0] . '</a></td>';
                } else {
                    $str .= '<td></td>';
                }
            }
            $str .= '</tr>';
        }
        $str .= '</tbody></table>';
        return $str;
    }

    private function getMark($marks, $date)
    {
        foreach ($marks as $mark)
            if ($mark->created->format('d:m:Y') == $date) {
                if ($mark->mark != 0) {
                    return [$mark->mark, $mark->id];
                } else {
                    if ($mark->n != '0') {
                        return [$mark->n, $mark->id];
                    }
                }
            }
        return false;
    }

        function parseMarksDates($data)
        {
            $dates = [];
            foreach ($data as $key) {
                $i = 0;
                while (isset($key->marks[$i])) {
                    $dates[] = $key->marks[$i]->created->format('d:m:Y');
                    $i++;
                }
            }
            return array_unique($dates);
        }
    }
