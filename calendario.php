<?php
    $data = '2020-01';
    $dia1 = date('w', strtotime($data));
    $quantidadeDiasMes = date('t', strtotime($data));
    $quantidadeLinhasCalendario = ceil(($dia1 + $quantidadeDiasMes) / 7);   
    $dia1 = -$dia1;
    $dataInicio = date('Y-m-d', strtotime($dia1.' days',strtotime($data)));
    $dataFim = date('Y-m-d', strtotime((($dia1 + ($quantidadeLinhasCalendario * 7) -1)).' days',strtotime($data)));
    echo $dataFim;
?>

<table border="1" width="100%">
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sab</th>
    </tr>
    <?php for($l = 0; $l < $quantidadeLinhasCalendario; $l++): ?>
        <tr>
            <?php for($q=0; $q<7; $q++):?>
                <?php
                    $w = date('d', strtotime(($q+($l*7)).' days', strtotime($dataInicio)))    
                ?>
                <td><?php echo $w; ?></td>
            <?php endfor;?>    
        </tr>
    <?php endfor;?>    
</table>