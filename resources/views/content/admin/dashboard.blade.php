<x-layoutadmin>
    <div class="main-content">
        <!-- Header -->
        <header class="bg-white shadow-sm p-4 flex items-center justify-between">
            <div class="flex items-center">
                <button id="toggleSidebar" class="md:hidden mr-4">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-2xl font-bold text-gray-800">{{ Auth::guard('admin')->user()->name }} Dashboard</h1>
            </div>

            <div class="flex items-center">
                <div class="relative mr-4">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center">3</span>
                    </button>
                </div>
                <div class="relative">
                    <button class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">A</div>
                        <span class="ml-2 text-gray-700">{{ Auth::guard('admin')->user()->name }}</span>
                        <i class="fas fa-chevron-down ml-2 text-gray-500"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-blue-100 text-primary">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Total Users</h2>
                            <p class="text-2xl font-bold">1,248</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-green-100 text-green-500">
                            <i class="fas fa-bed text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Total Rooms</h2>
                            <p class="text-2xl font-bold">86</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-purple-100 text-purple-500">
                            <i class="fas fa-calendar-check text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Active Bookings</h2>
                            <p class="text-2xl font-bold">42</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-red-100 text-red-500">
                            <i class="fas fa-boxes text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-500 text-sm">Inventory Items</h2>
                            <p class="text-2xl font-bold">156</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings Table -->
            <div class="bg-white rounded-xl shadow-sm mb-8">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800">Recent Bookings</h2>
                </div>
                <div class="table-container">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-500 text-sm font-medium">
                                <th class="p-4">Booking ID</th>
                                <th class="p-4">Guest</th>
                                <th class="p-4">Room</th>
                                <th class="p-4">Check-In</th>
                                <th class="p-4">Check-Out</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr class="border-t border-gray-100 hover:bg-gray-50">
                                <td class="p-4">#BK001</td>
                                <td class="p-4">John Doe</td>
                                <td class="p-4">Deluxe Suite</td>
                                <td class="p-4">15 Jun 2023</td>
                                <td class="p-4">20 Jun 2023</td>
                                <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-600">Confirmed</span></td>
                                <td class="p-4">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-t border-gray-100 hover:bg-gray-50">
                                <td class="p-4">#BK002</td>
                                <td class="p-4">Jane Smith</td>
                                <td class="p-4">Executive Room</td>
                                <td class="p-4">18 Jun 2023</td>
                                <td class="p-4">22 Jun 2023</td>
                                <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-600">Pending</span></td>
                                <td class="p-4">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-t border-gray-100 hover:bg-gray-50">
                                <td class="p-4">#BK003</td>
                                <td class="p-4">Robert Johnson</td>
                                <td class="p-4">Presidential Suite</td>
                                <td class="p-4">20 Jun 2023</td>
                                <td class="p-4">25 Jun 2023</td>
                                <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-600">Confirmed</span></td>
                                <td class="p-4">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-t border-gray-100 hover:bg-gray-50">
                                <td class="p-4">#BK004</td>
                                <td class="p-4">Sarah Williams</td>
                                <td class="p-4">Standard Room</td>
                                <td class="p-4">22 Jun 2023</td>
                                <td class="p-4">24 Jun 2023</td>
                                <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-600">Cancelled</span></td>
                                <td class="p-4">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                    <div class="text-sm text-gray-500">Showing 1 to 4 of 42 results</div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Previous</button>
                        <button class="px-3 py-1 rounded-lg bg-primary text-white">1</button>
                        <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">2</button>
                        <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </div>

            <!-- User Management & Inventory Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- User Management -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-800">User Management</h2>
                        <button class="text-primary hover:text-secondary">
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                    <div class="table-container">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-gray-500 text-sm font-medium">
                                    <th class="p-4">User</th>
                                    <th class="p-4">Role</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 text-primary flex items-center justify-center font-bold mr-3">J</div>
                                            <div>John Doe</div>
                                        </div>
                                    </td>
                                    <td class="p-4">Admin</td>
                                    <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-600">Active</span></td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-500 flex items-center justify-center font-bold mr-3">S</div>
                                            <div>Sarah Smith</div>
                                        </div>
                                    </td>
                                    <td class="p-4">Staff</td>
                                    <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-600">Active</span></td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold mr-3">R</div>
                                            <div>Robert Kim</div>
                                        </div>
                                    </td>
                                    <td class="p-4">Guest</td>
                                    <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-600">Inactive</span></td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Inventory Overview -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-800">Inventory Overview</h2>
                        <button class="text-primary hover:text-secondary">
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                    <div class="table-container">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-gray-500 text-sm font-medium">
                                    <th class="p-4">Item</th>
                                    <th class="p-4">Category</th>
                                    <th class="p-4">Quantity</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">Towels</td>
                                    <td class="p-4">Linen</td>
                                    <td class="p-4">120</td>
                                    <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-600">In Stock</span></td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">Shampoo</td>
                                    <td class="p-4">Amenities</td>
                                    <td class="p-4">85</td>
                                    <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-600">Low Stock</span></td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-t border-gray-100 hover:bg-gray-50">
                                    <td class="p-4">Pillows</td>
                                    <td class="p-4">Linen</td>
                                    <td class="p-4">200</td>
                                    <td class="p-4"><span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-600">In Stock</span></td>
                                    <td class="p-4">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layoutadmin>