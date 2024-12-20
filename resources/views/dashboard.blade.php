@php
    $counter = 1;
@endphp

<x-layout>
    <x-navbar />

    <section class="pl-[230px] w-full h-full p-5">
        <div class="flex flex-col w-full h-full gap-5 p-5 bg-white border border-gray-300 rounded-xl">
            <p class="font-bold">DASHBOARD</p>

            <div class="flex w-full gap-5">
                <div class="bg-[#1c68bb] shadow-[0px_5px_0px_0px_#000] border border-black rounded-xl basis-[60%]">
                    <div class="card-body">
                        <h2 class="text-white card-title">Pemasukan & Pengeluaran Hari Ini</h2>
                        <div class="flex gap-3">
                            <div
                                class="flex items-center w-full h-full gap-2 px-6 py-2 bg-white border border-black rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="flex items-center justify-center p-1 bg-green-600 border border-black rounded-full size-6">
                                    <path fill-rule="evenodd"
                                        d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p>Rp</p>
                                <p class="text-right">{{ number_format($totalMasuk, 0, ',', '.') }}</p>
                            </div>
                            <div
                                class="flex items-center w-full h-full gap-2 px-6 py-2 bg-white border border-black rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="flex items-center justify-center p-1 bg-red-600 border border-black rounded-full size-6">
                                    <path fill-rule="evenodd"
                                        d="M1.72 5.47a.75.75 0 0 1 1.06 0L9 11.69l3.756-3.756a.75.75 0 0 1 .985-.066 12.698 12.698 0 0 1 4.575 6.832l.308 1.149 2.277-3.943a.75.75 0 1 1 1.299.75l-3.182 5.51a.75.75 0 0 1-1.025.275l-5.511-3.181a.75.75 0 0 1 .75-1.3l3.943 2.277-.308-1.149a11.194 11.194 0 0 0-3.528-5.617l-3.809 3.81a.75.75 0 0 1-1.06 0L1.72 6.53a.75.75 0 0 1 0-1.061Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p>Rp</p>
                                <p class="text-right">{{ number_format($totalKeluar, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1c68bb] shadow-[0px_5px_0px_0px_#000] border border-black rounded-xl basis-[40%] text-white">
                    <div class="card-body">
                        <h2 class="font-bold card-title">Total Pendapatan NESASTECH</h2>
                        <div class="flex justify-between w-full item-center">
                            <p class="text-2xl">Rp</p>
                            <p class="pr-8 text-2xl text-right">{{ number_format($selisih, 0, ',', '.') }} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="w-full h-full overflow-y-auto bg-[#fafafa] border border-black rounded-xl shadow-[0px_6px_0px_0px_#000]">
                <table class="table">
                    <thead class="font-bold text-black bg-gray-200">
                        <tr>
                            <th class="text-center ">NO</th>
                            <th class="text-center ">TANGGAL</th>
                            <th class="text-center ">PEMASUKAN</th>
                            <th class="text-center ">PENGELUARAN</th>
                            <th class="text-center ">KETERANGAN</th>
                            <th class="text-center ">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="px-4 py-2 text-center">{{ $counter++ }}</td>
                                <td class="px-4 py-2 text-center">{{ $d->tanggal }}</td>

                                <td
                                    class="text-center py-2 px-4 {{ $d->masuk == 0 ? 'flex items-center justify-center' : '' }}">
                                    @if ($d->masuk == 0)
                                        -
                                    @else
                                        Rp {{ number_format($d->masuk, 0, ',', '.') }}
                                    @endif
                                </td>

                                <td
                                    class="text-center py-2 px-4 {{ $d->keluar == 0 ? 'flex items-center justify-center' : '' }}">
                                    @if ($d->keluar == 0)
                                        -
                                    @else
                                        Rp {{ number_format($d->keluar, 0, ',', '.') }}
                                    @endif
                                </td>

                                <td class="px-4 py-2">{{ $d->keterangan }}</td>

                                <td class="px-4 py-2 space-x-2 text-center text-white">
                                    <!-- Edit Button -->
                                    <a href="{{ route('keuangan.edit', $d->id) }}"
                                        class="px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-600">
                                        Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('keuangan.delete', $d->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layout>
