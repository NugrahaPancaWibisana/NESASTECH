<x-layout>
    <x-navbar></x-navbar>

    <section class="pl-[230px] w-full h-full p-5">
        <div class="flex flex-col w-full h-full gap-5 p-5 bg-white border border-gray-300 rounded-xl">
            <p class="font-bold">LAPORAN</p>

            <form action="{{ route('keuangan.store') }}" method="POST"
                class="flex flex-col w-full gap-5 p-5 bg-[#fafafa] border border-black shadow-[0px_5px_0px_0px_#000] rounded-xl">
                @csrf
                <div class="w-full">
                    <p>
                        <strong class="text-red-500">CATATAN:</strong>
                        Jika sudah menghitung semua uang yang ada, kurangi
                        dengan jumlah total
                        uang nesastech. Lalu masukan kedalam input pemasukan hasilnya, dan untuk pengeluaran jumlahkan
                        saja seluruh pengeluaran hari ini jika ada.
                        <br />
                        <br />
                        <strong>Uang sekarang - jumlah total uang = pendapatan hari ini</strong>
                    </p>
                </div>
                <div class="flex w-full gap-5">
                    <div class="w-full">
                        <div class="w-full px-2 bg-white border border-black rounded-xl">
                            <label class="hidden" for="masuk">Jumlah Masuk:</label>
                            <div class="flex items-center justify-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="flex items-center justify-center p-1 border border-black rounded-full size-6">
                                    <path fill-rule="evenodd"
                                        d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input class="w-full h-10 border-none outline-none" type="number" id="masuk"
                                    name="masuk" placeholder="Pemasukan" value="{{ old('masuk') }}">
                            </div>
                        </div>
                        @error('masuk')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <div class="w-full px-2 bg-white border border-black rounded-xl">
                            <label class="hidden" for="keluar">Jumlah Keluar:</label>
                            <div class="flex items-center justify-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="flex items-center justify-center p-1 border border-black rounded-full size-6">
                                    <path fill-rule="evenodd"
                                        d="M1.72 5.47a.75.75 0 0 1 1.06 0L9 11.69l3.756-3.756a.75.75 0 0 1 .985-.066 12.698 12.698 0 0 1 4.575 6.832l.308 1.149 2.277-3.943a.75.75 0 1 1 1.299.75l-3.182 5.51a.75.75 0 0 1-1.025.275l-5.511-3.181a.75.75 0 0 1 .75-1.3l3.943 2.277-.308-1.149a11.194 11.194 0 0 0-3.528-5.617l-3.809 3.81a.75.75 0 0 1-1.06 0L1.72 6.53a.75.75 0 0 1 0-1.061Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input class="w-full h-10 border-none outline-none" type="number" id="keluar"
                                    name="keluar" placeholder="Pengeluaran" value="{{ old('keluar') }}">
                            </div>
                        </div>
                        @error('keluar')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full p-1 px-2 bg-white border border-black rounded-xl">
                    <label class="hidden" for="keterangan">Keterangan:</label>
                    <textarea placeholder="Keterangan" class="w-full border-none outline-none resize-none h-44" id="keterangan"
                        name="keterangan" required>{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-1 px-2 bg-white border border-black rounded-xl">
                    <label class="hidden" for="tanggal">Tanggal:</label>
                    <input class="w-full h-10 border-none outline-none" type="date" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end w-full">
                    <button class="bg-[#1c68bb] text-white btn px-10 h-10 outline-none border border-black rounded-xl"
                        type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
