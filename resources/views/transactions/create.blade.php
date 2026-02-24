<!DOCTYPE html>
<html>
<head>
    <title>Create Transaction</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white shadow rounded-xl p-6">

    <h1 class="text-2xl font-bold mb-6">Create Journal Entry</h1>

    <form method="POST" action="/transactions">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Account</label>
            <select name="account_id" class="w-full border p-2 rounded">
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}">
                        {{ $account->account_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="debit">Debit</option>
                <option value="credit">Credit</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Amount</label>
            <input type="number" name="amount" class="w-full border p-2 rounded">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Submit
        </button>

    </form>

</div>

</body>
</html>
