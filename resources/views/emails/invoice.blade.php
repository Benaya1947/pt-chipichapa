<h2>Terima kasih sudah berbelanja 🙌</h2>

<p>Halo {{ $invoice->user->name }},</p>

<p>Pesanan kamu berhasil dibuat.</p>

<p><strong>Invoice:</strong> {{ $invoice->invoice_number }}</p>
<p>Total: Rp {{ number_format($invoice->total_price) }}</p>

<p>Invoice PDF terlampir ya 👍</p>