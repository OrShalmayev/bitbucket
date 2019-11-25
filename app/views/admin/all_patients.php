<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Register link</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['users'] as $user): ?>
            <tr>
                <!-- User id -->
                <th scope="row"><?php echo $user->id ?></th>
                <!-- Status -->
                <td><?php echo $user->email ?></td>
                <!-- Status -->
                <td class="text-white <?php echo $user->status ? 'bg-success' : 'bg-warning' ?>"><?php echo $user->status ? 'Confirmed' : 'Created' ?></td>
                <!-- Register Link -->
                <td>
                    <a href="<?php echo URLROOT .'users/register/'. $user->token ?>">link</a>
                    
                </td>
                <!-- Created At -->
                <td><?php echo $user->created_at ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>