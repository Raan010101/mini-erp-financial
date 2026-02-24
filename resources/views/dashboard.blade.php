<!DOCTYPE html>
<html>
<head>
    <title>Mini ERP Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            {{ $company->name }} - Financial Dashboard
        </h1>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-gray-500">Total Assets</h3>
                <p class="text-2xl font-semibold">RM {{ number_format($totalAssets, 2) }}</p>
            </div>

            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-gray-500">Revenue</h3>
                <p class="text-2xl font-semibold">RM {{ number_format($totalRevenue, 2) }}</p>
            </div>

            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-gray-500">Expenses</h3>
                <p class="text-2xl font-semibold">RM {{ number_format($totalExpense, 2) }}</p>
            </div>

            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-gray-500">Net Position</h3>
                <p class="text-2xl font-semibold">RM {{ number_format($netPosition, 2) }}</p>
            </div>

        </div>

        <!-- Receivables Section -->
        <div class="bg-white shadow rounded-xl p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Accounts Receivable</h2>
            <p class="mb-2">Outstanding: <strong>RM {{ number_format($outstandingReceivables, 2) }}</strong></p>
            <p>Unpaid Invoices: <strong>{{ $unpaidInvoiceCount }}</strong></p>
        </div>
        <a href="/transactions/create" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-6">
            Add Journal Entry
        </a>
        <!-- Chart -->
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">Financial Overview</h2>
            <canvas id="financialChart"></canvas>
        </div>

    </div>

    <script>
        const ctx = document.getElementById('financialChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Assets', 'Revenue', 'Expenses', 'Receivables'],
                datasets: [{
                    label: 'RM',
                    data: [
                        {{ $totalAssets }},
                        {{ $totalRevenue }},
                        {{ $totalExpense }},
                        {{ $outstandingReceivables }}
                    ],
                    backgroundColor: [
                        '#3B82F6',
                        '#10B981',
                        '#EF4444',
                        '#F59E0B'
                    ]
                }]
            }
        });
    </script>

</body>
</html>
