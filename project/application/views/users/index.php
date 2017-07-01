<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user):?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><a href="?delete=<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                    <td><a href="?update=<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>