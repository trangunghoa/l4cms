

<?php
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<div class="row">
    <div class="col-md-12">
        <div class="pagination pull-right">
            <?php echo $presenter->render(); ?>
        </div>
    </div>
</div>
