<?php

namespace Database\Seeders;

use App\Models\HRM\Employee;
use App\Models\HRM\Position;
use App\Models\HRM\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HrmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = array(
            [
                'name' => 'Board of Commissioner'
            ],
            [
                'name' => 'President'
            ],
            [
                'name' => 'Corporate Secretary'
            ],
            [
                'name' => 'General'
            ],
            [
                'name' => 'Commercial'
            ],
            [
                'name' => 'Finance'
            ],
            [
                'name' => 'Production'
            ],
            [
                'name' => 'Technology'
            ],
            [
                'name' => 'Development'
            ],
        );
        $position = array(
            [
                'department_id' => '1',
                'name' => 'Commissioners'
            ],
            [
                'department_id' => '1',
                'name' => 'Secretary Commissioner'
            ],
            [
                'department_id' => '1',
                'name' => 'Audit Committee'
            ],
            [
                'department_id' => '2',
                'name' => 'President Director'
            ],
            [
                'department_id' => '2',
                'name' => 'Finance & General Director'
            ],
            [
                'department_id' => '2',
                'name' => 'Production & Development Director'
            ],
            [
                'department_id' => '3',
                'name' => 'Head of Corporate Secretary'
            ],
            [
                'department_id' => '3',
                'name' => 'Deputy Chief Corporate Secretary'
            ],
            [
                'department_id' => '4',
                'name' => 'Head of General Affairs'
            ],
            [
                'department_id' => '5',
                'name' => 'Head of Commercial'
            ],
            [
                'department_id' => '6',
                'name' => 'Head of Finance'
            ],
            [
                'department_id' => '7',
                'name' => 'Head of Production'
            ],
            [
                'department_id' => '8',
                'name' => 'Head of Engineering'
            ],
            [
                'department_id' => '9',
                'name' => 'Head of Development'
            ],
        );
        $employee = array(
            [
                'nip' => '210521111',
                'name' => 'Zulhelmi Nasution',
                'email' => 'zulhelmi@yadaekidanta.com',
                'phone' => '085694798901',
                'jobdesc' => 'as Commissioner, Zulhelmi supervise the Board of Directors in carrying out company activities and provide advice to the Board of Directors. Supervise the implementation of the Company Plan',
                'date_birth' => '1966/07/21',
                'bio' => '',
                'address' => 'Komplek Perhubungan Udara, Jl. Warung Jati',
                'postcode' => '40287',
                'department_id' => '1',
                'position_id' => '1',
                'st' => 'a',
                'password' => Hash::make('password'),
            ],
            [
                'nip' => '210521242',
                'name' => 'Rizky Ramadhan',
                'email' => 'misterrizky@yadaekidanta.com',
                'phone' => '087709020299',
                'jobdesc' => 'as President Director, Rizky manage and provide leadership and insight to the Board of Directors within the Yada Ekidanta',
                'date_birth' => '1996/02/15',
                'bio' => '',
                'address' => 'Permata Buah Batu Residence Block C No. 15B',
                'postcode' => '40287',
                'department_id' => '2',
                'position_id' => '4',
                'st' => 'a',
                'password' => Hash::make('password'),
            ],
            [
                'nip' => '210521253',
                'name' => 'Ahmad Ridwan Ananta',
                'email' => 'anantalubis@yadaekidanta.com',
                'phone' => '081314616393',
                'jobdesc' => 'as Finance & General Director, Ananta role are responsible for all day-to-day management decisions and for implementing the YE long and short term plans',
                'date_birth' => '1999/12/03',
                'bio' => '',
                'address' => 'Kp Baru II No. 66',
                'postcode' => '0',
                'department_id' => '2',
                'position_id' => '5',
                'st' => 'a',
                'password' => Hash::make('password'),
            ]
            // [
            //     'nip' => '070122374',
            //     'name' => 'Nia Wiranti',
            //     'email' => 'niawrnt@yadaekidanta.com',
            //     'phone' => '08986025702',
            //     'jobdesc' => 'as Corporate Secretary, Nia Role is responsible for compiling all management work schedules and managing administrative affairs',
            //     'date_birth' => '1998/08/17',
            //     'bio' => '',
            //     'address' => 'Kp Lembang 2, bojongsari',
            //     'postcode' => '40288',
            //     'department_id' => '3',
            //     'position_id' => '7',
            //     'st' => 'a',
            //     'password' => Hash::make('password'),
            // ],
            // [
            //     'nip' => '07012288135',
            //     'name' => 'Paraptughessa Premaswari',
            //     'email' => 'imugik@yadaekidanta.com',
            //     'phone' => '081316106406',
            //     'jobdesc' => 'as Programmer, Ugik Role is responsible for the technical supervision of our Developers',
            //     'date_birth' => '2000/11/12',
            //     'bio' => '',
            //     'address' => 'Cibinong',
            //     'postcode' => '0',
            //     'department_id' => '8',
            //     'position_id' => '13',
            //     'st' => 'a',
            //     'password' => Hash::make('password'),
            // ]
        );
        foreach($department AS $d){
            Department::create([
                'name' => $d['name']
            ]);
        }
        foreach($position AS $r){
            Position::create([
                'department_id' => $r['department_id'],
                'name' => $r['name']
            ]);
        }
        foreach($employee AS $e){
            Employee::create([
                'nip' => $e['nip'],
                'name' => $e['name'],
                'email' => $e['email'],
                'phone' => $e['phone'],
                'jobdesc' => $e['jobdesc'],
                'date_birth' => $e['date_birth'],
                'bio' => $e['bio'],
                'address' => $e['address'],
                'postcode' => $e['postcode'],
                'department_id' => $e['department_id'],
                'position_id' => $e['position_id'],
                'st' => $e['st'],
                'password' => $e['password']
            ]);
        }
    }
}
