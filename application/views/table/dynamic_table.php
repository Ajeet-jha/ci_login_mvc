<table class='table table-hover' style="width:85%" id="table-layout">
    <thead class="thead-dark">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>City</th>
            <th>Number</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="table-data">
    
    <?php 
        if(!empty($result) && is_array($result)){
            foreach ($result as $tKey => $tValue) {
                ?>
                    <tr>
                        <td><?= $tValue['FirstName'] ?? ''?></td>
                        <td><?= $tValue['LastName'] ?? ''?></td>
                        <td><?= $tValue['City'] ?? ''?></td>
                        <td><?= $tValue['ContactNumber'] ?? ''?></td>
                        <td><?= $tValue['Email'] ?? ''?></td>
                    </tr>
                <?php
            }
        }
    ?>
    </tbody>
<table>