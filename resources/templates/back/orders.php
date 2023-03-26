
<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   Toate comenzile Hayak

</h1>
  <h4 class="bg-success"><?php display_message(); ?></h4>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Comandă</th>
           <th>Data</th>
           <th>Status</th>
           <th>Total</th>
      </tr>
    </thead>
    <tbody>
       
       <?php display_orders(); ?>

    </tbody>
</table>
</div>











            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include(TEMPLATE_BACK . "/footer.php"); ?>  