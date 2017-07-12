<!-- Page: virtual machines(виртуальные машины) -->
<?php
include_once "init.php";
$vm_item_list = get_vm_db_list(0, 100, $pdo);
$vm_list_vbox = get_vm_list($vbox_m_predict);
function filter_callback($var) {
    return ($var["name"][0] != 'c');
}

$res_arr_vm = array_filter($vm_list_vbox, "filter_callback");

foreach($vm_item_list as $value)
{
    foreach($res_arr_vm as $key => $value_t)
    {
        if(!strcasecmp($value["name"],$value_t["name"]))
        {
            if(isset(  $res_arr_vm [$key]  ))
            {
                unset( $res_arr_vm [$key] );
            }
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Список шаблонов виртуальных машин</h4>
                    </div>
                    <div class="content table-responsive table-full-width" style="padding-bottom: 0px;">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th colspan="2">Операции</th>
                                    </tr>
                                </thead>
                                <tbody id="select-list">
                                <?php foreach ($vm_item_list as $key => $lesson): ?>
                                    <tr>
                                        <td><?= $lesson['name'] ?></td>


                                        <td>
                                            <a href="" class="delete_lesson" data-name="<?= $lesson['name'] ?>">
                                                <i class="pe-7s-trash"></i> Удалить
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Список всех виртуальных машин</h4>
                    </div>
                    <div class="content table-responsive table-full-width" style="padding-bottom: 0px;">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th colspan="2">Операции</th>
                                </tr>
                                </thead>
                                <tbody id="all-list">
                                <?php foreach ($res_arr_vm as $key => $lesson): ?>
                                    <tr>
                                        <td><?= $lesson['name'] ?></td>

                                        <td>
                                            <a href="" class="add_lesson" data-name="<?= $lesson['name'] ?>">
                                                + Добавить
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    // Delete vm event

    function reInit() {
        $(".delete_lesson").unbind( "click" );
        $(".delete_lesson").click(function (event) {
            event.preventDefault();
            var el_r = $(this);
            var name_el = $(this).attr("data-name");
            $.ajax({
                url: 'delete?item_name=' + $(this).attr("data-name"),
                success: function (data) {
                    el_r.parent().parent().remove();
                    console.log('good del');
                    var newLi = document.createElement('tr');
                    newLi.innerHTML = "<td>" + name_el + "</td> <td> <a href='' class='add_lesson' data-name='" + name_el +"'> + Добавить </a> </td>";
                    $('#all-list').append(newLi);
                    reInit()
                }
            });
        });

        $(".add_lesson").unbind( "click" );
        // Delete vm event
        $(".add_lesson").click(function (event) {
            event.preventDefault();
            var el_r = $(this);
            var name_el = $(this).attr("data-name");
            $.ajax({
                url: 'create?item_name=' + $(this).attr("data-name"),
                success: function (data) {
                    el_r.parent().parent().remove();
                    console.log('good add');
                    var newLi = document.createElement('tr');
                    newLi.innerHTML = "<td>" + name_el + "</td> <td> <a href='' class='delete_lesson' data-name='" + name_el +"'> <i class='pe-7s-trash'></i> Удалить </a> </td>";
                    $('#select-list').append(newLi);
                    reInit()
                }
            });
        });
    }


    reInit();
</script>