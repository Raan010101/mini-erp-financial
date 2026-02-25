<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Create Journal Entry
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-xl p-6">

                <form method="POST" action="{{ route('transactions.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Debit Account</label>
                        <select name="debit_account_id" class="w-full border p-2 rounded">
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">
                                    {{ $account->account_name }} ({{ ucfirst($account->account_type) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Credit Account</label>
                        <select name="credit_account_id" class="w-full border p-2 rounded">
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">
                                    {{ $account->account_name }} ({{ ucfirst($account->account_type) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Amount</label>
                        <input type="number" step="0.01" name="amount" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Description</label>
                        <input type="text" name="description" class="w-full border p-2 rounded">
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Post Transaction
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
