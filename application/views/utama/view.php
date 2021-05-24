<div class="container my-5">
   <table>
       <tr>
            <td><?php echo '<p>'.$locations_id['address'].'</p>'; ?></td>
            <td><a href="<?= base_url('landing/delete_loc/').$locations_id['id']; ?>" onclick="return confirm('Yakin dihapus?');" class="fa fa-trash"><button class="alert alert-danger" type="button">Delete [X]</button></a></td>
       </tr>
   </table>
</div>