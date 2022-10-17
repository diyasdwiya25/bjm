
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>No Order</th>
        <th>Pembeli</th>
        <th>Produk</th>
        <th>Sub Total</th>
        <th>Diskon/Subsidi</th>
        <th>Total Penjualan</th>
        <th>Pembayaran</th>
        <th>Saldo</th>
    </tr>
    </thead>


    <tbody>
        <?php
        $no = 1;
        ?>
        @foreach($booking as $key => $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ date('d-m-Y', strtotime($row->created_at)); }}</td>
            <td>{{ $row->id_booking }}</td>
            <td>{{ $row->fullname }}</td>
            <td>{{ $row->product_name }}</td>
            <td>@currency($row->price_product)</td>
            <td>@currency($row->subsidi_value)</td>
            <td>@currency($row->price_product - $row->subsidi_value)</td>
            <td>
                <?php if($row->payment_status == 1) { ?>
                    @currency($row->booking_total)
                <?php } ?>
            </td>
            <td>
                <?php if($row->payment_status == 0) { ?>
                    @currency($row->booking_total)
                <?php } ?>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>