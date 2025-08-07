 <button {{ $attributes }} class="border-b border-b-blue-400 p-2  text-[13px] font-bold">
                    @php
                    //  echo number_format($price, 2)
                      $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
                      $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
                      $formattedNumber = $formatter->formatCurrency($price, 'QAR');
                      print $formattedNumber
                    @endphp
        {{-- {{ $price }}.00 Qr</button> --}}
