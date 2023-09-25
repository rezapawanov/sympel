<div class="card" style="width: 400px;">
    <h4 class="text-center mb-2">Struk Pembayaran Uang Pangkal</h4>
    <p><?=date('d-m-Y H:i', strtotime($data['created_at']))?></p>
    <p>Total tagihan : <?=number_format($data['nominal_harus_bayar'])?></p>
    <p>Nominal Bayar : <?=number_format($data['bayar'])?></p>
    <p>Sisa Tagihan  : <?=number_format($data['nominal_harus_bayar']-$data['total_terbayar'])?></p>
</div>