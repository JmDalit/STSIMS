<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_courses')->insert([
            // --- INFORMATION & COMPUTING ---
            ['name' => 'Bachelor of Science in Information Technology', 'field' => 'Information & Computing', 'abbreviation' => 'BSIT'],
            ['name' => 'Bachelor of Science in Computer Science', 'field' => 'Information & Computing', 'abbreviation' => 'BSCS'],
            ['name' => 'Bachelor of Science in Information Systems', 'field' => 'Information & Computing', 'abbreviation' => 'BSIS'],

            ['name' => 'Bachelor of Science in Entertainment and Multimedia Computing', 'field' => 'Information & Computing', 'abbreviation' => 'BSEMC'],
            ['name' => 'Bachelor of Science in Data Science', 'field' => 'Information & Computing', 'abbreviation' => 'BSDS'],
            ['name' => 'Bachelor of Science in Cybersecurity', 'field' => 'Information & Computing', 'abbreviation' => 'BSCYBER'],
            ['name' => 'Bachelor of Science in Library and Information Science', 'field' => 'Information & Computing', 'abbreviation' => 'BLIS'],
            ['name' => 'Bachelor of Science in Animation', 'field' => 'Information & Computing', 'abbreviation' => 'BSANIM'],
            ['name' => 'Bachelor of Science in Applied Computing', 'field' => 'Information & Computing', 'abbreviation' => 'BSAC'],

            /* ===========================
               ENGINEERING
               =========================== */

            ['name' => 'Bachelor of Science in Mechanical Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSME'],
            ['name' => 'Bachelor of Science in Electrical Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSEE'],
            ['name' => 'Bachelor of Science in Electronics Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSECE'],
            ['name' => 'Bachelor of Science in Chemical Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSCHE'],
            ['name' => 'Bachelor of Science in Industrial Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSIE'],
            ['name' => 'Bachelor of Science in Geodetic Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSGE'],
            ['name' => 'Bachelor of Science in Computer Engineering Technology', 'field' => 'Engineering', 'abbreviation' => 'BSCpET'],

            ['name' => 'Bachelor of Science in Metallurgical Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSMetE'],
            ['name' => 'Bachelor of Science in Petroleum Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSPE'],
            ['name' => 'Bachelor of Science in Mechatronics Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSMECH'],
            ['name' => 'Bachelor of Science in Aerospace Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSAE'],
            ['name' => 'Bachelor of Science in Instrumentation and Control Engineering', 'field' => 'Engineering', 'abbreviation' => 'BSICE'],

            /* ===========================
               HEALTH SCIENCES
               =========================== */
            ['name' => 'Bachelor of Science in Nursing', 'field' => 'Health Sciences', 'abbreviation' => 'BSN'],


            ['name' => 'Bachelor of Science in Radiologic Technology', 'field' => 'Health Sciences', 'abbreviation' => 'BSRT'],
            ['name' => 'Bachelor of Science in Physical Therapy', 'field' => 'Health Sciences', 'abbreviation' => 'BSPT'],
            ['name' => 'Bachelor of Science in Occupational Therapy', 'field' => 'Health Sciences', 'abbreviation' => 'BSOT'],
            ['name' => 'Bachelor of Science in Nutrition and Dietetics', 'field' => 'Health Sciences', 'abbreviation' => 'BSND'],
            ['name' => 'Bachelor of Science in Respiratory Therapy', 'field' => 'Health Sciences', 'abbreviation' => 'BSRTher'],

            ['name' => 'Bachelor of Science in Public Health', 'field' => 'Health Sciences', 'abbreviation' => 'BSPH'],
            ['name' => 'Bachelor of Science in Emergency Health Services', 'field' => 'Health Sciences', 'abbreviation' => 'BSEHS'],
            ['name' => 'Bachelor of Science in Biotechnology', 'field' => 'Health Sciences', 'abbreviation' => 'BSBT'],
            ['name' => 'Bachelor of Science in Dental Technology', 'field' => 'Health Sciences', 'abbreviation' => 'BSDT'],
            ['name' => 'Bachelor of Science in Medical Laboratory Science', 'field' => 'Health Sciences', 'abbreviation' => 'BSMLS'],
            ['name' => 'Bachelor of Science in Speech-Language Pathology', 'field' => 'Health Sciences', 'abbreviation' => 'BSSLP'],

            /* ===========================
               EDUCATION
               =========================== */

            ['name' => 'Bachelor of Early Childhood Education', 'field' => 'Education', 'abbreviation' => 'BECEd'],

            ['name' => 'Bachelor of Physical Education', 'field' => 'Education', 'abbreviation' => 'BPEd'],
            ['name' => 'Bachelor of Special Needs Education', 'field' => 'Education', 'abbreviation' => 'BSNEd'],
            ['name' => 'Bachelor of Technical-Vocational Teacher Education', 'field' => 'Education', 'abbreviation' => 'BTVTEd'],
            ['name' => 'Bachelor of Culture and Arts Education', 'field' => 'Education', 'abbreviation' => 'BCAEd'],

            /* ===========================
               BUSINESS & MANAGEMENT
               =========================== */
            ['name' => 'Bachelor of Science in Business Administration', 'field' => 'Business & Management', 'abbreviation' => 'BSBA'],
            ['name' => 'Bachelor of Science in Accountancy', 'field' => 'Business & Management', 'abbreviation' => 'BSA'],
            ['name' => 'Bachelor of Science in Management Accounting', 'field' => 'Business & Management', 'abbreviation' => 'BSMA'],
            ['name' => 'Bachelor of Science in Internal Auditing', 'field' => 'Business & Management', 'abbreviation' => 'BSIA'],
            ['name' => 'Bachelor of Science in Entrepreneurship', 'field' => 'Business & Management', 'abbreviation' => 'BSEntrep'],
            ['name' => 'Bachelor of Science in Marketing Management', 'field' => 'Business & Management', 'abbreviation' => 'BSMM'],
            ['name' => 'Bachelor of Science in Human Resource Management', 'field' => 'Business & Management', 'abbreviation' => 'BSHRM'],
            ['name' => 'Bachelor of Science in Office Administration', 'field' => 'Business & Management', 'abbreviation' => 'BSOA'],
            ['name' => 'Bachelor of Science in Retail Management', 'field' => 'Business & Management', 'abbreviation' => 'BSRM'],
            ['name' => 'Bachelor of Science in Tourism Management', 'field' => 'Business & Management', 'abbreviation' => 'BSTM'],
            ['name' => 'Bachelor of Science in Hospitality Management', 'field' => 'Business & Management', 'abbreviation' => 'BSHM'],

        ]);
        DB::table('list_courses')->insert([
            [
                'name' => 'Bachelor of Science in Architecture',
                'field' => 'Architecture and Design',
                'abbreviation' => 'BSArch'
            ],
            [
                'name' => 'Bachelor of Landscape Architecture',
                'field' => 'Architecture and Design',
                'abbreviation' => 'BLA'
            ],
            [
                'name' => 'Bachelor of Interior Design',
                'field' => 'Architecture and Design',
                'abbreviation' => 'BID'
            ],
            [
                'name' => 'Bachelor of Fine Arts',
                'field' => 'Arts and Humanities',
                'abbreviation' => 'BFA'
            ],
            [
                'name' => 'Bachelor of Arts in Philosophy',
                'field' => 'Arts and Humanities',
                'abbreviation' => 'AB Philosophy'
            ],
            [
                'name' => 'Bachelor of Arts in English',
                'field' => 'Arts and Humanities',
                'abbreviation' => 'AB English'
            ],
            [
                'name' => 'Bachelor of Science in Psychology',
                'field' => 'Social Sciences',
                'abbreviation' => 'BSPsych'
            ],
            [
                'name' => 'Bachelor of Arts in Sociology',
                'field' => 'Social Sciences',
                'abbreviation' => 'AB Socio'
            ],
            [
                'name' => 'Bachelor of Arts in Anthropology',
                'field' => 'Social Sciences',
                'abbreviation' => 'AB Anthro'
            ],
            [
                'name' => 'Bachelor of Arts in History',
                'field' => 'Social Sciences',
                'abbreviation' => 'AB History'
            ],
            [
                'name' => 'Bachelor of Science in Social Work',
                'field' => 'Public Administration & Governance',
                'abbreviation' => 'BSSW'
            ],
            [
                'name' => 'Bachelor of Secondary Education major in English',
                'field' => 'Education',
                'abbreviation' => 'BSEd English'
            ],
            [
                'name' => 'Bachelor of Secondary Education major in Science',
                'field' => 'Education',
                'abbreviation' => 'BSEd Science'
            ],
            [
                'name' => 'Bachelor of Elementary Education',
                'field' => 'Education',
                'abbreviation' => 'BEEd'
            ],
            [
                'name' => 'Bachelor of Science in Medical Technology',
                'field' => 'Health Sciences',
                'abbreviation' => 'BSMT'
            ],
            [
                'name' => 'Bachelor of Science in Industrial Security Management',
                'field' => 'Criminology & Security',
                'abbreviation' => 'BSISM'
            ],
            [
                'name' => 'Bachelor of Arts in Criminology',
                'field' => 'Criminology & Security',
                'abbreviation' => 'BACrim'
            ],
            [
                'name' => 'Bachelor of Science in Criminology',
                'field' => 'Criminology & Security',
                'abbreviation' => 'BSCrim'
            ],
            [
                'name' => 'Bachelor of Science in Fire Protection and Safety Engineering',
                'field' => 'Criminology & Security',
                'abbreviation' => 'BSFPSE'
            ],
            [
                'name' => 'Bachelor of Science in Culinary Management',
                'field' => 'Hospitality & Tourism',
                'abbreviation' => 'BSCM'
            ],
            [
                'name' => 'Bachelor of Music',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'BM'
            ],
            [
                'name' => 'Bachelor of Performing Arts',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'BPA'
            ],
            [
                'name' => 'Bachelor of Arts in Theater Arts',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'AB Theater'
            ],
            [
                'name' => 'Bachelor of Arts in Film',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'AB Film'
            ]

        ]);
        DB::table('list_courses')->insert([
            [
                'name' => 'Bachelor of Science in Pharmacy',
                'field' => 'Health Sciences',
                'abbreviation' => 'BSP'
            ],
            [
                'name' => 'Bachelor of Science in Midwifery',
                'field' => 'Health Sciences',
                'abbreviation' => 'BSM'
            ],
            [
                'name' => 'Bachelor of Science in Nutrition',
                'field' => 'Health Sciences',
                'abbreviation' => 'BSNutr'
            ],
            [
                'name' => 'Bachelor of Science in Biomedical Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSBME'
            ],
            [
                'name' => 'Bachelor of Science in Mining Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSME'
            ],
            [
                'name' => 'Bachelor of Science in Geological Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSGeoE'
            ],
            [
                'name' => 'Bachelor of Science in Computer Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSCpE'
            ],

            [
                'name' => 'Bachelor of Science in Civil Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSCE'
            ],
            [
                'name' => 'Bachelor of Science in Sanitary Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSSE'
            ],
            [
                'name' => 'Bachelor of Science in Agricultural Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSAE'
            ],
            [
                'name' => 'Bachelor of Science in Ceramics Engineering',
                'field' => 'Engineering',
                'abbreviation' => 'BSCerE'
            ],
            [
                'name' => 'Bachelor of Science in Accounting Information Systems',
                'field' => 'Business & Management',
                'abbreviation' => 'BSAIS'
            ],

            [
                'name' => 'Bachelor of Science in Forensic Science',
                'field' => 'Criminology & Law',
                'abbreviation' => 'BSFS'
            ],
            [
                'name' => 'Bachelor of Laws (LLB)',
                'field' => 'Criminology & Law',
                'abbreviation' => 'LLB'
            ],
            [
                'name' => 'Juris Doctor (JD)',
                'field' => 'Criminology & Law',
                'abbreviation' => 'JD'
            ],
            [
                'name' => 'Bachelor of Arts in Legal Management',
                'field' => 'Criminology & Law',
                'abbreviation' => 'ABLM'
            ],
            [
                'name' => 'Bachelor of Arts in Public Safety',
                'field' => 'Criminology & Law',
                'abbreviation' => 'BAPS'
            ],
            [
                'name' => 'Bachelor of Science in Agriculture',
                'field' => 'Agriculture & Environmental Science',
                'abbreviation' => 'BSA'
            ],
            [
                'name' => 'Bachelor of Science in Agribusiness',
                'field' => 'Agriculture & Environmental Science',
                'abbreviation' => 'BSAB'
            ],
            [
                'name' => 'Bachelor of Science in Animal Science',
                'field' => 'Agriculture & Environmental Science',
                'abbreviation' => 'BSAS'
            ],
            [
                'name' => 'Bachelor of Science in Fisheries',
                'field' => 'Agriculture & Environmental Science',
                'abbreviation' => 'BSF'
            ],
            [
                'name' => 'Bachelor of Science in Veterinary Technology',
                'field' => 'Agriculture & Environmental Science',
                'abbreviation' => 'BSVT'
            ],
            [
                'name' => 'Bachelor of Arts in Music',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'AB Music'
            ],

            [
                'name' => 'Bachelor of Arts in Dance',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'AB Dance'
            ],
            [
                'name' => 'Bachelor of Arts in Literature',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'AB Literature'
            ],
            [
                'name' => 'Bachelor of Fine Arts in Visual Communication',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'BFA-VC'
            ],
            [
                'name' => 'Bachelor of Fine Arts in Painting',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'BFA-Painting'
            ],
            [
                'name' => 'Bachelor of Fine Arts in Sculpture',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'BFA-Sculpture'
            ],
            [
                'name' => 'Bachelor of Science in Industrial Design',
                'field' => 'Architecture & Design',
                'abbreviation' => 'BSID'
            ],
            [
                'name' => 'Bachelor of Science in Fashion Design',
                'field' => 'Architecture & Design',
                'abbreviation' => 'BSFD'
            ],
            [
                'name' => 'Bachelor of Science in Game Development',
                'field' => 'Information Technology',
                'abbreviation' => 'BSGD'
            ]

        ]);

        DB::table('list_courses')->insert([

            [
                'name' => 'Bachelor of Science in Multimedia Arts',
                'field' => 'Information Technology / Arts',
                'abbreviation' => 'BSMA'
            ],
            [
                'name' => 'Bachelor of Science in Interior Architecture',
                'field' => 'Architecture & Design',
                'abbreviation' => 'BSIA'
            ],
            [
                'name' => 'Bachelor of Science in Industrial Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSITech'
            ],
            [
                'name' => 'Bachelor of Science in Electronics Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSET'
            ],
            [
                'name' => 'Bachelor of Science in Automotive Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSAutoTech'
            ],
            [
                'name' => 'Bachelor of Science in Computer Technology',
                'field' => 'Information Technology',
                'abbreviation' => 'BSCT'
            ],
            [
                'name' => 'Bachelor of Science in Electrical Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSET'
            ],
            [
                'name' => 'Bachelor of Science in Mechanical Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSMT'
            ],
            [
                'name' => 'Bachelor of Science in Civil Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSCTech'
            ],
            [
                'name' => 'Bachelor of Science in Drafting Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSDT'
            ],
            [
                'name' => 'Bachelor of Science in Electronics and Communications Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSECT'
            ],

            [
                'name' => 'Bachelor of Science in Power Engineering Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSPET'
            ],
            [
                'name' => 'Bachelor of Science in Marine Engineering Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSMarET'
            ],
            [
                'name' => 'Bachelor of Science in Industrial Safety and Health Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSISHT'
            ],
            [
                'name' => 'Bachelor of Science in Environmental and Sanitary Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSEST'
            ],
            [
                'name' => 'Bachelor of Science in Aviation Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSAT'
            ],
            [
                'name' => 'Bachelor of Science in Aeronautical Engineering',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSAE'
            ],
            [
                'name' => 'Bachelor of Science in Naval Architecture and Marine Engineering Technology',
                'field' => 'Engineering & Technology',
                'abbreviation' => 'BSNAME Tech'
            ],
            [
                'name' => 'Bachelor of Science in Real Estate Management',
                'field' => 'Business & Management',
                'abbreviation' => 'BSREM'
            ],
            [
                'name' => 'Bachelor of Science in Insurance Management',
                'field' => 'Business & Management',
                'abbreviation' => 'BSIM'
            ],
            [
                'name' => 'Bachelor of Science in Banking and Finance',
                'field' => 'Business & Management',
                'abbreviation' => 'BSBF'
            ],
            [
                'name' => 'Bachelor of Science in Financial Management',
                'field' => 'Business & Management',
                'abbreviation' => 'BSFM'
            ],
            [
                'name' => 'Bachelor of Science in Investment Management',
                'field' => 'Business & Management',
                'abbreviation' => 'BSIMgmt'
            ],
            [
                'name' => 'Bachelor of Science in Hospitality and Tourism Management',
                'field' => 'Hospitality & Tourism',
                'abbreviation' => 'BSHTM'
            ],
            [
                'name' => 'Bachelor of Science in Travel Management',
                'field' => 'Hospitality & Tourism',
                'abbreviation' => 'BSTM'
            ],
            [
                'name' => 'Bachelor of Science in Event Management',
                'field' => 'Hospitality & Tourism',
                'abbreviation' => 'BSEM'
            ],
            [
                'name' => 'Bachelor of Science in Hotel and Restaurant Management',
                'field' => 'Hospitality & Tourism',
                'abbreviation' => 'BSHRM'
            ],
            [
                'name' => 'Bachelor of Science in Culinary Arts',
                'field' => 'Hospitality & Tourism',
                'abbreviation' => 'BSCA'
            ],
            [
                'name' => 'Bachelor of Science in Baking and Pastry Arts',
                'field' => 'Hospitality & Tourism',
                'abbreviation' => 'BSBPA'
            ],
            [
                'name' => 'Bachelor of Science in Food Technology',
                'field' => 'Hospitality & Tourism / Science',
                'abbreviation' => 'BSFT'
            ],
            [
                'name' => 'Bachelor of Science in Clinical Laboratory Science',
                'field' => 'Health Sciences',
                'abbreviation' => 'BSCLS'
            ],

            [
                'name' => 'Bachelor of Science in Nuclear Medicine Technology',
                'field' => 'Health Sciences',
                'abbreviation' => 'BSNMT'
            ],
            [
                'name' => 'Bachelor of Science in Ultrasound Technology',
                'field' => 'Health Sciences',
                'abbreviation' => 'BSUT'
            ]

        ]);

        DB::table('list_courses')->insert([
            [
                'name' => 'Bachelor of Science in Occupational Safety and Health',
                'field' => 'Health & Safety',
                'abbreviation' => 'BSOSH'
            ],
            [
                'name' => 'Bachelor of Science in Environmental Health',
                'field' => 'Health & Safety',
                'abbreviation' => 'BSEH'
            ],
            [
                'name' => 'Bachelor of Science in Gerontology',
                'field' => 'Health & Safety',
                'abbreviation' => 'BSG'
            ],
            [
                'name' => 'Bachelor of Arts in Political Science',
                'field' => 'Social Sciences',
                'abbreviation' => 'AB PolSci'
            ],
            [
                'name' => 'Bachelor of Arts in Psychology',
                'field' => 'Social Sciences',
                'abbreviation' => 'AB Psych'
            ],

            [
                'name' => 'Bachelor of Arts in Journalism',
                'field' => 'Communication & Media',
                'abbreviation' => 'AB Journalism'
            ],
            [
                'name' => 'Bachelor of Arts in Broadcasting',
                'field' => 'Communication & Media',
                'abbreviation' => 'AB Broadcasting'
            ],
            [
                'name' => 'Bachelor of Arts in Communication',
                'field' => 'Communication & Media',
                'abbreviation' => 'AB Communication'
            ],
            [
                'name' => 'Bachelor of Science in Development Communication',
                'field' => 'Communication & Media',
                'abbreviation' => 'BSDC'
            ],
            [
                'name' => 'Bachelor of Science in Forestry',
                'field' => 'Agriculture & Environmental Science',
                'abbreviation' => 'BS Forestry'
            ],
            [
                'name' => 'Bachelor of Science in Environmental Science',
                'field' => 'Agriculture & Environmental Science',
                'abbreviation' => 'BSES'
            ],
            [
                'name' => 'Bachelor of Science in Geology',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BS Geo'
            ],
            [
                'name' => 'Bachelor of Science in Geography',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BS Geography'
            ],
            [
                'name' => 'Bachelor of Science in Meteorology',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BSMet'
            ],
            [
                'name' => 'Bachelor of Science in Marine Biology',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BSMB'
            ],
            [
                'name' => 'Bachelor of Science in Biology',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BS Bio'
            ],
            [
                'name' => 'Bachelor of Science in Chemistry',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BS Chem'
            ],
            [
                'name' => 'Bachelor of Science in Physics',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BS Physics'
            ],
            [
                'name' => 'Bachelor of Science in Mathematics',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BS Math'
            ],
            [
                'name' => 'Bachelor of Science in Statistics',
                'field' => 'Natural Sciences',
                'abbreviation' => 'BS Stat'
            ],
            [
                'name' => 'Bachelor of Science in Marine Transportation',
                'field' => 'Maritime',
                'abbreviation' => 'BSMT'
            ],
            [
                'name' => 'Bachelor of Science in Marine Engineering',
                'field' => 'Maritime',
                'abbreviation' => 'BSMarE'
            ],
            [
                'name' => 'Bachelor of Science in Naval Architecture and Marine Engineering',
                'field' => 'Maritime',
                'abbreviation' => 'BSNAME'
            ],
            [
                'name' => 'Bachelor of Science in Customs Administration',
                'field' => 'Public Administration & Governance',
                'abbreviation' => 'BSCA'
            ],
            [
                'name' => 'Bachelor of Public Administration',
                'field' => 'Public Administration & Governance',
                'abbreviation' => 'BPA'
            ],
            [
                'name' => 'Bachelor of Science in Disaster Risk Reduction and Management',
                'field' => 'Public Administration & Governance',
                'abbreviation' => 'BSDRRM'
            ]

        ]);

        DB::table('list_courses')->insert([

            [
                'name' => 'Bachelor of Secondary Education',
                'field' => 'Education',
                'abbreviation' => 'BSED'
            ],
            [
                'name' => 'Bachelor of Science in Mathematics Education',
                'field' => 'Education',
                'abbreviation' => 'BSMathEd'
            ],
            [
                'name' => 'Bachelor of Science in Science Education',
                'field' => 'Education',
                'abbreviation' => 'BSScEd'
            ],
            [
                'name' => 'Bachelor of Science in Social Studies Education',
                'field' => 'Education',
                'abbreviation' => 'BSSSEd'
            ],
            [
                'name' => 'Bachelor of Science in English Education',
                'field' => 'Education',
                'abbreviation' => 'BSEngEd'
            ],
            [
                'name' => 'Bachelor of Science in Filipino Education',
                'field' => 'Education',
                'abbreviation' => 'BSFilEd'
            ],
            [
                'name' => 'Bachelor of Science in Special Education',
                'field' => 'Education',
                'abbreviation' => 'BSPED'
            ],
            [
                'name' => 'Bachelor of Science in Guidance and Counseling',
                'field' => 'Education',
                'abbreviation' => 'BSGC'
            ],
            [
                'name' => 'Bachelor of Library and Information Science',
                'field' => 'Education',
                'abbreviation' => 'BLIS'
            ],
            [
                'name' => 'Bachelor of Science in Information Management',
                'field' => 'Education / IT',
                'abbreviation' => 'BSIM'
            ],
            [
                'name' => 'Bachelor of Science in Tourism Education',
                'field' => 'Education / Hospitality',
                'abbreviation' => 'BSTE'
            ],
            [
                'name' => 'Bachelor of Science in Industrial Education',
                'field' => 'Education / Technical',
                'abbreviation' => 'BSIEd'
            ],
            [
                'name' => 'Bachelor of Science in Education Major in Home Economics',
                'field' => 'Education / Technical',
                'abbreviation' => 'BSEd-HE'
            ],
            [
                'name' => 'Bachelor of Science in Education Major in Technology and Livelihood Education',
                'field' => 'Education / Technical',
                'abbreviation' => 'BSEd-TLE'
            ],
            [
                'name' => 'Bachelor of Science in Hotel and Restaurant Education',
                'field' => 'Education / Hospitality',
                'abbreviation' => 'BSHREd'
            ],
            [
                'name' => 'Bachelor of Science in Nursing Education',
                'field' => 'Education / Health',
                'abbreviation' => 'BSNEd'
            ],

            [
                'name' => 'Bachelor of Science in Health Education',
                'field' => 'Education / Health',
                'abbreviation' => 'BSHEd'
            ],
            [
                'name' => 'Bachelor of Arts in Religious Studies',
                'field' => 'Arts & Humanities',
                'abbreviation' => 'AB RS'
            ],
            [
                'name' => 'Bachelor of Science in Exercise and Sports Science',
                'field' => 'Health & Fitness',
                'abbreviation' => 'BSESS'
            ],
            [
                'name' => 'Bachelor of Science in Sports Coaching',
                'field' => 'Health & Fitness',
                'abbreviation' => 'BSSC'
            ],
            [
                'name' => 'Bachelor of Science in Recreation and Leisure Studies',
                'field' => 'Health & Fitness',
                'abbreviation' => 'BSRLS'
            ],
            [
                'name' => 'Bachelor of Science in Human Kinetics',
                'field' => 'Health & Fitness',
                'abbreviation' => 'BSHK'
            ],

        ]);
    }
}
