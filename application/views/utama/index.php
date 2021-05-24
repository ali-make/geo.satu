<main>
    <div class="container">
        <h1 class="py-3"><?php echo $title; ?></h1>

        <?php foreach ($locations as $locations_id): ?>
            <table>
                <tr>No. <a href="<?php echo site_url('landing/'.$locations_id['id']); ?>"><?php echo $locations_id['id']; ?></a> | </tr>
                <tr><?php echo $locations_id['address']; ?></tr>
            </table>
            <br>
        <?php endforeach; ?>
    </div>
</main>