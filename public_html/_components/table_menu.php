<?php
if (!isset($menu)) {
    echo '$menu variable is not defined. Please check the code.';
}
?>
<div class="table-container">
<table class="min-w-full divide-y divide-gray-300">
  <thead class="bg-gray-50">
    <tr>
      <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
      <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Category
      </th>
      <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
      <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
      <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
    </tr>
  </thead>
  <tbody class="divide-y divide-gray-200 bg-white">
    <?php
    // Cant combine functions with string so we have to assign the function to a variable here.
    $site_url = site_url();
    while ($item = mysqli_fetch_array($menu)) {
        $price = '$' . number_format($item['price']/100, 2);;
        echo "
          <tr>
            <td class='whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6'>{$item['id']}</td>
            <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>{$item['category']}</td>
            <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>{$item['menu_item']}</td>
            <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>{$item['item_description']}</td>
            <td class='whitespace-nowrap px-3 py-4 text-sm text-gray-500'>{$price}</td>
          </tr>";
    }
?>
  </tbody>
</table>
</div>