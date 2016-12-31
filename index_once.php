<!-- Page: index-control(Управление) -->
<?php
include_once "libs/db/dbconnection.php";
include_once "modules/lesson/lib/functions.php";

//Get lesson list and active lesson
$curr_lesson = get_lesson($_GET['lesson_id'],$pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <ul class="list-group">
                            <?=$curr_lesson['name']?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Описание виртуальной среды</h4>
                    </div>
                    <div class="content ls-descr">
                        <?= $curr_lesson['description'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Настройки виртуальных машин</h4>
                    </div>
                    <div class="content">
                        <form lpformnum="1" _lpchecked="1" id="virt-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //Request for get vm list(for this select lesson)
    function set_vm_list(vm) {
        $.ajax({
            url: 'getvm?lab_id=' + vm,
            success: function (data) {
                $('#virt-info').html(data);
            }
        });
    }

    //Default set vm list
    $(document).ready(function () {
        set_vm_list("<?=$curr_lesson['id']?>");
    });

    //Lesson picker choice event
    $(".ls-item").click(function (event) {
        if (!$(this).hasClass('active')) {
            $
            var el_r = $(this);
            $.ajax({
                url: 'descr?item_id=' + $(this).attr("data-id"),
                success: function (data) {
                    $('.ls-descr').html(data);
                }
            });
            set_vm_list($(this).attr("data-id"));
        }
    });
</script>
