<?php
/* @var $this yii\web\View */
    $this->registerJsFile('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js', 
        ['depends' => 'yii\web\JqueryAsset']);
    $this->registerJsFile('.\web\js\city.js', 
        ['depends' => 'yii\web\JqueryAsset']);

    $this->registerCssFile('https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css', 
    ['depends' => 'yii\web\JqueryAsset']);
?>
<h1>city/index</h1>
<table id="citiesTable" class="display">
    <thead>
        <tr>
            <th>miejscowość</th>
            <th>gmina</th>
            <th>powiat</th>
            <th>województwo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 3</td>
            <td>Row 1 Data 4</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
            <td>Row 2 Data 3</td>
            <td>Row 2 Data 4</td>
        </tr>
    </tbody>
</table>


