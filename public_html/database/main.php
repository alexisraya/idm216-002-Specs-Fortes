<?php
include_once __DIR__ . '/../app.php';
$page_title = 'Database';
$menu = get_menu();
include_once __DIR__ . '/../_components/header.php';
?>

<div class="mx-auto my-16 max-w-7xl px-4">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <?php include __DIR__ . '/../_components/table_menu.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../_components/footer.php';
?>