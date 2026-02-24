<!DOCTYPE html>
<html>
<head>
    <title>Mini ERP Dashboard</title>
    <style>
        body { font-family: Arial; padding: 40px; }
        .card { padding: 20px; margin: 15px 0; border: 1px solid #ddd; border-radius: 8px; }
    </style>
</head>
<body>

    <h1>{{ $company->name }} - Financial Dashboard</h1>

    <div class="card">
        <h3>Total Assets</h3>
        <p>RM {{ number_format($totalAssets, 2) }}</p>
    </div>

    <div class="card">
        <h3>Total Revenue</h3>
        <p>RM {{ number_format($totalRevenue, 2) }}</p>
    </div>

    <div class="card">
        <h3>Total Expenses</h3>
        <p>RM {{ number_format($totalExpense, 2) }}</p>
    </div>

    <div class="card">
        <h3>Net Position</h3>
        <p>RM {{ number_format($netPosition, 2) }}</p>
    </div>

    <div class="card">
    <h3>Outstanding Receivables</h3>
    <p>RM {{ number_format($outstandingReceivables, 2) }}</p>
    <p>Unpaid Invoices: {{ $unpaidInvoiceCount }}</p>
</div>

</body>
</html>
