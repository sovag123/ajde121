@extends('layouts.layout')

@section('content')

<!-- Content -->
<section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Pero Perovic
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                <a href="{{route}}" class="text-[#2196f3] hover:text-blue-600">
                                            Svi ucenici
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                            ID-354
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="pt-[24px] pr-[30px]">
                        <a href="#" class="inline hover:text-blue-600 show-modal">
                            <i class="fas fa-redo-alt mr-[3px]"></i>
                            Resetuj sifru
                        </a>
                        <a href="editUcenik.php" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-edit mr-[3px] "></i>
                            Izmjeni podatke
                        </a>
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsStudentProfile hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-student-profile">
                            <div class="absolute right-0 w-56 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="#" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izbrisi korisnika</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-b-[1px] py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                <a href="ucenikProfile.php" class="inline active-book-nav">
                    Osnovni detalji
                </a>
                <a href="ucenikIzdate.php" class="inline ml-[70px] hover:text-blue-800">
                    Evidencija iznajmljivanja
                </a>
            </div>
            <div class="height-ucenikProfile pb-[30px] scroll">
                <!-- Space for content -->
                <div class="pl-[30px] section- mt-[20px]">
                    <div class="flex flex-row">
                        <div class="mr-[30px]">
                            <div class="mt-[20px]">
                                <span class="text-gray-500">Ime i prezime</span>
                                <p class="font-medium">Pero Perovic</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Tip korisnika</span>
                                <p class="font-medium">Ucenik</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">JMBG</span>
                                <p class="font-medium">1345687815462</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Email</span>
                                <a href="#" class="block font-medium text-[#2196f3]">pero.perovic@domain.net</a>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Korisnicko ime</span>
                                <p class="font-medium">pero.perovic</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Broj logovanja</span>
                                <p class="font-medium">60</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Poslednji put logovan/a</span>
                                <p class="font-medium">Prekjuce 11:57 AM</p>
                            </div>

                        </div>
                        <div class="ml-[100px]  mt-[20px]">
                            <img class="p-2 border-2 border-gray-300" width="300px" src="img/profileStudent.jpg" alt="">
                        </div>
                    </div>
                </div>

        </section>
        <!-- End Content -->s

@endsection