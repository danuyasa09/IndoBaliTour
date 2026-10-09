<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Booking - {{ $booking->full_name }}</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @media print {
            body { background: white; margin: 0; padding: 0; }
            .no-print { display: none !important; }
            .print-border { border: 1px solid #e5e7eb; }
        }
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        .page { background: white; max-width: 21cm; min-height: 29.7cm; margin: 2rem auto; padding: 3rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); }
        @media print {
            .page { margin: 0; box-shadow: none; max-width: 100%; min-height: auto; padding: 1rem; }
        }
    </style>
</head>
<body>
    <div class="max-w-4xl mx-auto mt-8 mb-4 no-print text-right px-4">
        <button onclick="window.print()" class="bg-[#7A0C16] text-white px-5 py-2.5 rounded-lg shadow-sm font-semibold hover:bg-red-800 transition-colors inline-flex items-center gap-2">
            <i class="fa-solid fa-print"></i> Cetak / Save PDF
        </button>
        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="ml-3 bg-white border border-gray-300 text-gray-700 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-50 transition-colors inline-block">
            Kembali
        </a>
    </div>

    <div class="page rounded-xl">
        <div class="border-b-2 border-gray-900 pb-6 mb-8 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">DETAIL BOOKING</h1>
                <p class="text-gray-500 mt-1 font-medium text-sm">Indo Bali Tour</p>
            </div>
            <div class="text-right">
                <p class="text-base font-bold text-gray-900">ID: #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</p>
                <p class="text-xs text-gray-500 mt-1">Dicetak: {{ now()->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-8 mb-10">
            <div>
                <h2 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Informasi Pemesan</h2>
                <div class="space-y-1.5">
                    <p class="font-bold text-gray-900 text-xl">{{ $booking->full_name }}</p>
                    <p class="text-sm text-gray-600 font-medium"><i class="fa-brands fa-whatsapp mr-1 text-green-500"></i> {{ $booking->phone }}</p>
                    <p class="text-sm text-gray-600"><i class="fa-regular fa-envelope mr-1 text-gray-400"></i> {{ $booking->email ?? '-' }}</p>
                </div>
            </div>
            <div>
                <h2 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Informasi Pesanan</h2>
                <div class="space-y-2 text-sm">
                    <div class="flex">
                        <span class="text-gray-500 w-28 shrink-0">Tipe Layanan:</span> 
                        <span class="font-bold text-gray-900 capitalize">{{ str_replace('_', ' ', $booking->type) }}</span>
                    </div>
                    <div class="flex">
                        <span class="text-gray-500 w-28 shrink-0">Item / Tour:</span> 
                        <span class="font-bold text-gray-900">{{ $booking->item_title ?? '-' }}</span>
                    </div>
                    <div class="flex">
                        <span class="text-gray-500 w-28 shrink-0">Tanggal:</span> 
                        <span class="font-bold text-gray-900">{{ $booking->booking_date ? $booking->booking_date->format('d F Y') : '-' }}</span>
                    </div>
                    <div class="flex">
                        <span class="text-gray-500 w-28 shrink-0">Peserta:</span> 
                        <span class="font-bold text-gray-900">{{ $booking->total_person ? $booking->total_person . ' Pax' : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border print-border border-gray-200 rounded-xl overflow-hidden mb-8">
            <div class="bg-gray-50 px-5 py-3 border-b border-gray-200">
                <h2 class="text-sm font-bold text-gray-800"><i class="fa-solid fa-list-check mr-2 text-gray-400"></i>Instruksi & Detail Tambahan (Driver)</h2>
            </div>
            <div class="p-5">
                @if($booking->details && is_array($booking->details))
                    <div class="grid grid-cols-1 gap-5">
                        @foreach($booking->details as $key => $value)
                            <div class="border-b border-gray-100 last:border-0 pb-4 last:pb-0">
                                <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1.5">{{ str_replace('_', ' ', $key) }}</p>
                                <div class="text-sm text-gray-900 whitespace-pre-wrap font-medium">{!! $value ?? '-' !!}</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 italic">Tidak ada detail tambahan.</p>
                @endif
            </div>
        </div>

        <div class="text-center mt-16 pt-8 border-t border-gray-200">
            <p class="text-xs text-gray-400">Dokumen ini dicetak dari sistem administrasi Indo Bali Tour dan ditujukan untuk keperluan operasional lapangan.</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Slight delay to allow CSS/fonts to load before printing
            setTimeout(() => {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>
