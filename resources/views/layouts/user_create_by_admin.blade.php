@extends('layouts.app')
@section('content')
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden  sm:rounded-lg  shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h2 class="text-2xl font-semibold mb-4">Add User</h2>
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">Fullname</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">Email</label>
                            <input type="email" id="name" name="email"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">Contact Number</label>
                            <input type="text" id="name" name="ph_no"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="message"
                                class="block text-gray-700 font-medium text-black dark:text-white">Address</label>
                            <textarea id="message" name="address" rows="4"
                                class="w-full px-4 py-2 rounded border border-gray-300  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                ></textarea>
                        </div>




                        <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                              Select Department
                            </label>
                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                              <select
                                 name="dept_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option selected value="">Select Your Department</option>

                                @foreach ($departments as $department)
                                <option  value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                @endforeach
                              </select>
                              <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <g opacity="0.8">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                      fill=""></path>
                                  </g>
                                </svg>
                              </span>
                            </div>
                          </div>
                        <div class="mb-4.5">
                            <label class="mb-2.5 block text-black dark:text-white">
                                Select Role
                            </label>
                            <div class="relative z-20 bg-transparent dark:bg-form-input">
                                <select
                                    name="role_name" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                    <option selected value="">Select Your Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill=""></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">Contact Number</label>
                            <input type="password" id="name" name="password"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">Contact Number</label>
                            <input type="password" id="name" name="password_confirmation"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>

                        <div>
                            <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Create User
                              </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
