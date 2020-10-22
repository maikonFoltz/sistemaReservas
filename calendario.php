<form action="" method="get">
    <select name="ano" id="ano">
        <?php for($q=date('Y'); $q>2010; $q--):?>
            <option value="<?php echo $q;?>"><?php echo $q;?></option>
        <?php endfor;?>    
    </select>
    <select name="mes" id="mes">
        <option value="1">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
        <option value="6">06</option>
        <option value="7">07</option>
        <option value="8">08</option>
        <option value="9">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        
    </select>

    <input type="submit" value="Mostrar">
</form>

<?php
    if(empty($_GET['ano'])){
        exit;
    }
    $data = $_GET['ano'].' - '.$_GET['mes'];
    $dia1 = date('w', strtotime($data));
    $quantidadeDiasMes = date('t', strtotime($data));
    $quantidadeLinhasCalendario = ceil(($dia1 + $quantidadeDiasMes) / 7);   
    $dia1 = -$dia1;
    $dataInicio = date('Y-m-d', strtotime($dia1.' days',strtotime($data)));
    $dataFim = date('Y-m-d', strtotime((($dia1 + ($quantidadeLinhasCalendario * 7) -1)).' days',strtotime($data)));
    
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