<h2>INVOICE</h2>

<p><strong>Invoice:</strong> {{ $invoice->invoice_number }}</p>
<p><strong>Customer:</strong> {{ $invoice->user->name }}</p>
<p><strong>Address:</strong> {{ $invoice->address }}</p>

<hr>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoice->items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->price) }}</td>
            <td>{{ number_format($item->subtotal) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>

<h3>Total: Rp {{ number_format($invoice->total_price) }}</h3>