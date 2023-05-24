<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u>Product Association</u></h4>
                        <p>This show how product associate with each other, i.e How they often occur together in a single order /purchase</p>
                        <table class="table table-hover">
                        <thead>
                            <tr class="bg-gradient-primary">
                            <th> # </th>
                            <th>Product Association</th>
                            <th>Percentage </th>
                            </tr>
                        </thead>
                        <tbody>
        <?php   
            include 'class.apriori.php';

            $Apriori = new Apriori();

            $Apriori->setMaxScan(20);       //Scan 2, 3, ...
            $Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
            $Apriori->setMinConf(75);       //Minimum confidence - Percent 1, 2, ..., 100
            $Apriori->setDelimiter(',');    //Delimiter 

            /*
            Use Array:
            $dataset   = array();
            $dataset[] = array('A', 'B', 'C', 'D'); 
            $dataset[] = array('A', 'D', 'C');  
            $dataset[] = array('B', 'C'); 
            $dataset[] = array('A', 'E', 'C'); 
            $Apriori->process($dataset);
            */
            $Apriori->process('dataset.txt');

            //Frequent Itemsets
            // echo '<h1>Frequent Items</h1>';
            // $Apriori->printFreqItemsets();

            // echo '<h3>Frequent Itemsets Array</h3>';
            // print_r($Apriori->getFreqItemsets()); 

            //Association Rules
            // echo '<h1>Association</h1>';
            $Apriori->printAssociationRules();

            // echo '<h3>Association Rules Array</h3>';
            // print_r($Apriori->getAssociationRules()); 

            //Save to file
            $Apriori->saveFreqItemsets('freqItemsets.txt');
            $Apriori->saveAssociationRules('associationRules.txt');
        ?>  
</tbody>
                        </table>
                    </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<!-- content -->
<?php include('admin_footer.php');?>