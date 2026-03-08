<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>অর্ডার লিস্ট</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">অর্ডার লিস্ট</h1>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-xl overflow-hidden">
        <thead class="bg-indigo-500 text-white">
          <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Amount</th>
            <th class="px-4 py-2">Transaction ID</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Date</th>
            <th class="px-4 py-2">Screenshot</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          <!-- Example order row -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2">1</td>
            <td class="px-4 py-2">Kazi Sifat</td>
            <td class="px-4 py-2">+880123456789</td>
            <td class="px-4 py-2">example@gmail.com</td>
            <td class="px-4 py-2">৳349</td>
            <td class="px-4 py-2">DBXX000001</td>
            <td class="px-4 py-2">
              <span class="px-2 py-1 rounded text-white bg-yellow-500">Pending</span>
            </td>
            <td class="px-4 py-2">09 Mar, 2026 12:30</td>
            <td class="px-4 py-2">
              <a href="path/to/image.jpg" target="_blank">
                <img src="path/to/image.jpg" class="w-16 h-16 object-cover rounded">
              </a>
            </td>
          </tr>

          <!-- আরও অর্ডার এখানে যোগ করুন -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2">2</td>
            <td class="px-4 py-2">Rahim Ali</td>
            <td class="px-4 py-2">+880987654321</td>
            <td class="px-4 py-2">rahim@example.com</td>
            <td class="px-4 py-2">৳500</td>
            <td class="px-4 py-2">DBXX000002</td>
            <td class="px-4 py-2">
              <span class="px-2 py-1 rounded text-white bg-green-500">Completed</span>
            </td>
            <td class="px-4 py-2">08 Mar, 2026 15:20</td>
            <td class="px-4 py-2">
              <a href="path/to/image2.jpg" target="_blank">
                <img src="path/to/image2.jpg" class="w-16 h-16 object-cover rounded">
              </a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

  </div>

</body>
</html>