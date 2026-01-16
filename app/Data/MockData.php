<?php

namespace App\Data;

class MockData
{
    public static function businessInfo(): array
    {
        return [
            'name' => 'Peekaboo Daycare & Preschool',
            'tagline' => 'A Safe, Loving Space Where Little Minds Grow',
            'address' => '139B Humewood Drive, Parklands, 7441, Cape Town',
            'phone' => '021 557 4999',
            'mobile' => '082 898 9967',
            'email' => 'peekaboodaycare@telkomsa.net',
            'hours' => '06:00 - 18:00',
            'half_day_hours' => '06:00 - 12:00 (Babies-3yrs) / 06:00 - 13:00 (4yrs-Gr.R)',
            'facebook' => 'https://facebook.com/peekaboodaycare',
            'whatsapp' => 'https://wa.me/27828989967',
            'maps' => 'https://maps.google.com/?q=139B+Humewood+Drive+Parklands+Cape+Town',
            'established' => 2010,
            'registration_fee' => 500,
        ];
    }

    public static function fees(): array
    {
        return [
            [
                'id' => 'half-day',
                'name' => 'Half Day',
                'hours' => '06:00 - 12:00 (Babies-3yrs) / 06:00 - 13:00 (4yrs-Gr.R)',
                'price' => 3800,
                'features' => ['Qualified teachers', 'Educational activities', 'Morning snack', 'Safe environment', 'Daily feedback'],
                'popular' => false,
            ],
            [
                'id' => 'full-day',
                'name' => 'Full Day',
                'hours' => '06:00 - 18:00',
                'price' => 4200,
                'features' => ['All half-day benefits', 'Lunch included', 'Afternoon activities', 'Rest time', 'Extended care'],
                'popular' => true,
            ],
            [
                'id' => 'snack-box',
                'name' => 'Snack Box',
                'hours' => 'Monthly add-on',
                'price' => 400,
                'features' => ['Healthy snacks', 'Balanced nutrition', 'Variety of options', 'Special dietary needs'],
                'popular' => false,
                'addon' => true,
            ],
        ];
    }

    public static function programs(): array
    {
        return [
            [
                'id' => 'baby-room',
                'name' => 'Baby Room',
                'age' => '3 months - 18 months',
                'description' => 'A nurturing environment where our youngest learners receive loving attention and developmentally appropriate stimulation.',
                'features' => ['Individual care routines', 'Sensory play', 'Tummy time activities', 'Sleep schedules respected', 'Daily parent communication'],
                'image' => 'assets/img/peekaboo/baby-room.jpg',
                'capacity' => 8,
                'ratio' => '1:4',
            ],
            [
                'id' => 'toddlers',
                'name' => 'Toddlers',
                'age' => '18 months - 3 years',
                'description' => 'Active exploration and discovery through play-based learning, building social skills and independence.',
                'features' => ['Potty training support', 'Language development', 'Creative arts', 'Outdoor play', 'Music and movement'],
                'image' => 'assets/img/peekaboo/toddlers.jpg',
                'capacity' => 12,
                'ratio' => '1:6',
            ],
            [
                'id' => 'preschool',
                'name' => 'Preschool',
                'age' => '3 - 4 years',
                'description' => 'Structured learning activities that prepare children for kindergarten while fostering creativity and curiosity.',
                'features' => ['Pre-reading skills', 'Number concepts', 'Science exploration', 'Social development', 'Fine motor skills'],
                'image' => 'assets/img/peekaboo/preschool.jpg',
                'capacity' => 15,
                'ratio' => '1:8',
            ],
            [
                'id' => 'kindergarten',
                'name' => 'Grade R / Kindergarten',
                'age' => '5 - 6 years',
                'description' => 'Comprehensive school readiness program following the CAPS curriculum to ensure a smooth transition to Grade 1.',
                'features' => ['CAPS curriculum', 'Reading & writing', 'Mathematics', 'Life skills', 'School readiness'],
                'image' => 'assets/img/peekaboo/kindergarten.jpg',
                'capacity' => 20,
                'ratio' => '1:10',
            ],
        ];
    }

    public static function services(): array
    {
        return [
            [
                'id' => 'sleepovers',
                'name' => 'Sleepovers',
                'description' => 'Fun overnight stays with friends featuring movies, games, and supervised activities.',
                'price' => 350,
                'icon' => 'fa-moon',
            ],
            [
                'id' => 'holiday-care',
                'name' => 'Holiday Care',
                'description' => 'Full-day care during school holidays with special activities and outings.',
                'price' => 250,
                'icon' => 'fa-sun',
            ],
            [
                'id' => 'snack-box',
                'name' => 'Snack Box',
                'description' => 'Healthy, nutritious snacks provided throughout the day.',
                'price' => 400,
                'icon' => 'fa-apple-whole',
            ],
            [
                'id' => 'extra-murals',
                'name' => 'Extra Murals',
                'description' => 'Swimming, ballet, soccer, and other activities available.',
                'price' => 'Varies',
                'icon' => 'fa-futbol',
            ],
            [
                'id' => 'birthday-parties',
                'name' => 'Birthday Parties',
                'description' => 'Celebrate your child\'s special day with friends at our venue.',
                'price' => 1500,
                'icon' => 'fa-cake-candles',
            ],
        ];
    }

    public static function staff(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Sarah van der Merwe',
                'role' => 'Principal & Founder',
                'qualification' => 'B.Ed Early Childhood Development',
                'experience' => 15,
                'bio' => 'Sarah founded Peekaboo with a vision to create a nurturing environment where every child can thrive. Her passion for early childhood education drives the school\'s philosophy.',
                'image' => 'assets/img/team/team-1-1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Thandi Nkosi',
                'role' => 'Head Teacher - Preschool',
                'qualification' => 'Diploma in ECD Level 5',
                'experience' => 8,
                'bio' => 'Thandi brings creativity and warmth to her classroom. She specializes in preparing children for school readiness through play-based learning.',
                'image' => 'assets/img/team/team-1-2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Michelle Peters',
                'role' => 'Baby Room Supervisor',
                'qualification' => 'Diploma in ECD Level 4',
                'experience' => 10,
                'bio' => 'Michelle\'s gentle nature makes her perfect for caring for our youngest learners. She creates a calm, loving atmosphere for babies.',
                'image' => 'assets/img/team/team-1-3.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Nomsa Dlamini',
                'role' => 'Toddler Teacher',
                'qualification' => 'Certificate in Child Care',
                'experience' => 6,
                'bio' => 'Nomsa loves the energy of toddlers and channels it into meaningful learning experiences. Her patience is endless.',
                'image' => 'assets/img/team/team-1-4.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Lisa Thompson',
                'role' => 'Grade R Teacher',
                'qualification' => 'B.Ed Foundation Phase',
                'experience' => 12,
                'bio' => 'Lisa ensures our Grade R learners are fully prepared for formal schooling. Her structured approach builds confidence.',
                'image' => 'assets/img/team/team-1-5.jpg',
            ],
        ];
    }

    public static function testimonials(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Amanda Botha',
                'role' => 'Parent of Emma (4)',
                'content' => 'Peekaboo has been a blessing for our family. Emma comes home every day excited about what she learned. The teachers truly care about each child.',
                'rating' => 5,
                'image' => 'assets/img/testimonial/testi-1-1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'David & Priya Naidoo',
                'role' => 'Parents of twins Arun & Maya (3)',
                'content' => 'Having twins in daycare can be challenging, but Peekaboo handles it beautifully. The staff give individual attention to both our children.',
                'rating' => 5,
                'image' => 'assets/img/testimonial/testi-1-2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Michael Johnson',
                'role' => 'Parent of Ethan (5)',
                'content' => 'The Grade R program prepared Ethan so well for school. He started Grade 1 confident in reading and writing. Worth every cent!',
                'rating' => 5,
                'image' => 'assets/img/testimonial/testi-1-3.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Zandile Khumalo',
                'role' => 'Parent of Sipho (2)',
                'content' => 'I was nervous leaving my baby for the first time, but the team at Peekaboo made us feel at ease. The daily updates and photos are wonderful.',
                'rating' => 5,
                'image' => 'assets/img/testimonial/testi-1-4.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Claire & Johan Smith',
                'role' => 'Parents of Mia (6)',
                'content' => 'Mia has been at Peekaboo since she was 1. The consistency and quality of care has been exceptional. We recommend it to everyone.',
                'rating' => 5,
                'image' => 'assets/img/testimonial/testi-1-5.jpg',
            ],
        ];
    }

    public static function faqs(): array
    {
        return [
            [
                'question' => 'What are your operating hours?',
                'answer' => 'We are open Monday to Friday from 06:00 to 18:00. We offer both half-day (until 12:00/13:00) and full-day options.',
            ],
            [
                'question' => 'What is your sick child policy?',
                'answer' => 'For the health and safety of all children, we regret that sick children cannot attend school. Children with fever, vomiting, or contagious conditions must stay home.',
            ],
            [
                'question' => 'Do you provide meals?',
                'answer' => 'We offer an optional Snack Box service for R400/month which provides healthy snacks throughout the day. Parents can also send their own food.',
            ],
            [
                'question' => 'What is your teacher-to-child ratio?',
                'answer' => 'We maintain low ratios: 1:4 for babies, 1:6 for toddlers, 1:8 for preschool, and 1:10 for Grade R.',
            ],
            [
                'question' => 'Is there a registration fee?',
                'answer' => 'Yes, there is a non-refundable R500 deposit required upon enrollment to secure your child\'s place.',
            ],
            [
                'question' => 'What is your notice period?',
                'answer' => 'A full calendar month\'s written notice is required to withdraw your child. We do not accept notice for the month of November.',
            ],
            [
                'question' => 'Do you offer sibling discounts?',
                'answer' => 'Yes! We offer discounts for families with 2 or more children enrolled. Please contact us for specific details.',
            ],
            [
                'question' => 'What curriculum do you follow?',
                'answer' => 'Our Grade R program follows the CAPS curriculum. All programs incorporate age-appropriate learning through play.',
            ],
        ];
    }

    public static function trustBadges(): array
    {
        return [
            ['icon' => 'fa-certificate', 'text' => 'Licensed & Registered'],
            ['icon' => 'fa-video', 'text' => 'CCTV Monitored'],
            ['icon' => 'fa-graduation-cap', 'text' => 'Qualified Teachers'],
            ['icon' => 'fa-utensils', 'text' => 'Safe & Healthy Meals'],
            ['icon' => 'fa-heart', 'text' => 'Happy Parents'],
        ];
    }

    // Dashboard & Admin Mock Data
    public static function dashboardStats(): array
    {
        return [
            'total_enrolled' => 45,
            'new_applications' => 8,
            'pending_applications' => 5,
            'waiting_list' => 12,
            'monthly_revenue' => 178500,
            'outstanding_fees' => 15200,
            'attendance_today' => 42,
            'staff_count' => 8,
        ];
    }

    public static function applications(): array
    {
        return [
            [
                'id' => 'APP-2026-001',
                'child_name' => 'Sophie Williams',
                'child_dob' => '2023-05-15',
                'parent_name' => 'Jennifer Williams',
                'parent_email' => 'jennifer.w@email.com',
                'parent_phone' => '082 123 4567',
                'program' => 'Toddlers',
                'fee_option' => 'Full Day',
                'status' => 'pending',
                'submitted_at' => '2026-01-10',
                'source' => 'Website',
                'documents_complete' => true,
            ],
            [
                'id' => 'APP-2026-002',
                'child_name' => 'James Pieterse',
                'child_dob' => '2022-08-22',
                'parent_name' => 'Maria Pieterse',
                'parent_email' => 'maria.p@email.com',
                'parent_phone' => '083 234 5678',
                'program' => 'Preschool',
                'fee_option' => 'Half Day',
                'status' => 'approved',
                'submitted_at' => '2026-01-08',
                'source' => 'Facebook',
                'documents_complete' => true,
            ],
            [
                'id' => 'APP-2026-003',
                'child_name' => 'Lerato Molefe',
                'child_dob' => '2024-01-30',
                'parent_name' => 'Thabo Molefe',
                'parent_email' => 'thabo.m@email.com',
                'parent_phone' => '084 345 6789',
                'program' => 'Baby Room',
                'fee_option' => 'Full Day',
                'status' => 'pending',
                'submitted_at' => '2026-01-12',
                'source' => 'WhatsApp',
                'documents_complete' => false,
            ],
            [
                'id' => 'APP-2026-004',
                'child_name' => 'Emily van Niekerk',
                'child_dob' => '2021-03-18',
                'parent_name' => 'Susan van Niekerk',
                'parent_email' => 'susan.vn@email.com',
                'parent_phone' => '072 456 7890',
                'program' => 'Grade R',
                'fee_option' => 'Full Day',
                'status' => 'waiting_list',
                'submitted_at' => '2026-01-05',
                'source' => 'Referral',
                'documents_complete' => true,
            ],
            [
                'id' => 'APP-2026-005',
                'child_name' => 'Noah Adams',
                'child_dob' => '2023-11-05',
                'parent_name' => 'Mark Adams',
                'parent_email' => 'mark.a@email.com',
                'parent_phone' => '061 567 8901',
                'program' => 'Toddlers',
                'fee_option' => 'Full Day',
                'status' => 'rejected',
                'submitted_at' => '2026-01-03',
                'source' => 'Website',
                'documents_complete' => true,
                'rejection_reason' => 'Class at capacity',
            ],
        ];
    }

    public static function enrolledChildren(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Emma Botha',
                'dob' => '2022-03-15',
                'class' => 'Toddlers',
                'parent_name' => 'Amanda Botha',
                'parent_phone' => '082 111 2222',
                'parent_email' => 'amanda.b@email.com',
                'fee_option' => 'Full Day',
                'monthly_fee' => 4200,
                'balance' => 0,
                'enrolled_date' => '2024-01-15',
                'allergies' => 'None',
                'medical_notes' => '',
            ],
            [
                'id' => 2,
                'name' => 'Arun Naidoo',
                'dob' => '2023-06-20',
                'class' => 'Toddlers',
                'parent_name' => 'David Naidoo',
                'parent_phone' => '083 222 3333',
                'parent_email' => 'david.n@email.com',
                'fee_option' => 'Full Day',
                'monthly_fee' => 4200,
                'balance' => 0,
                'enrolled_date' => '2025-02-01',
                'allergies' => 'Peanuts',
                'medical_notes' => 'EpiPen in bag',
            ],
            [
                'id' => 3,
                'name' => 'Maya Naidoo',
                'dob' => '2023-06-20',
                'class' => 'Toddlers',
                'parent_name' => 'Priya Naidoo',
                'parent_phone' => '083 222 3334',
                'parent_email' => 'priya.n@email.com',
                'fee_option' => 'Full Day',
                'monthly_fee' => 4200,
                'balance' => 0,
                'enrolled_date' => '2025-02-01',
                'allergies' => 'Peanuts',
                'medical_notes' => 'EpiPen in bag',
                'sibling_discount' => true,
            ],
            [
                'id' => 4,
                'name' => 'Ethan Johnson',
                'dob' => '2020-09-10',
                'class' => 'Grade R',
                'parent_name' => 'Michael Johnson',
                'parent_phone' => '084 333 4444',
                'parent_email' => 'michael.j@email.com',
                'fee_option' => 'Full Day',
                'monthly_fee' => 4200,
                'balance' => 4200,
                'enrolled_date' => '2023-01-10',
                'allergies' => 'None',
                'medical_notes' => '',
            ],
            [
                'id' => 5,
                'name' => 'Sipho Khumalo',
                'dob' => '2024-02-14',
                'class' => 'Baby Room',
                'parent_name' => 'Zandile Khumalo',
                'parent_phone' => '072 444 5555',
                'parent_email' => 'zandile.k@email.com',
                'fee_option' => 'Half Day',
                'monthly_fee' => 3800,
                'balance' => 0,
                'enrolled_date' => '2025-08-01',
                'allergies' => 'Dairy',
                'medical_notes' => 'Lactose intolerant - soy formula provided',
            ],
        ];
    }

    public static function payments(): array
    {
        return [
            [
                'id' => 'PAY-001',
                'child_id' => 1,
                'child_name' => 'Emma Botha',
                'amount' => 4200,
                'date' => '2026-01-02',
                'method' => 'EFT',
                'status' => 'confirmed',
                'reference' => 'BOTHA-JAN26',
            ],
            [
                'id' => 'PAY-002',
                'child_id' => 2,
                'child_name' => 'Arun Naidoo',
                'amount' => 8400,
                'date' => '2026-01-03',
                'method' => 'EFT',
                'status' => 'confirmed',
                'reference' => 'NAIDOO-JAN26',
                'notes' => 'Includes Maya (sibling)',
            ],
            [
                'id' => 'PAY-003',
                'child_id' => 4,
                'child_name' => 'Ethan Johnson',
                'amount' => 4200,
                'date' => '2026-01-15',
                'method' => 'POP Upload',
                'status' => 'pending',
                'reference' => 'JOHNSON-JAN26',
            ],
            [
                'id' => 'PAY-004',
                'child_id' => 5,
                'child_name' => 'Sipho Khumalo',
                'amount' => 3800,
                'date' => '2026-01-01',
                'method' => 'Cash',
                'status' => 'confirmed',
                'reference' => 'KHUMALO-JAN26',
            ],
        ];
    }

    public static function leads(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Karen Mitchell',
                'phone' => '082 999 1111',
                'email' => 'karen.m@email.com',
                'child_age' => '2 years',
                'source' => 'Facebook Ad',
                'status' => 'new',
                'created_at' => '2026-01-14',
                'notes' => 'Interested in toddler program',
            ],
            [
                'id' => 2,
                'name' => 'Peter Jacobs',
                'phone' => '083 888 2222',
                'email' => 'peter.j@email.com',
                'child_age' => '4 years',
                'source' => 'Website',
                'status' => 'contacted',
                'created_at' => '2026-01-12',
                'notes' => 'Called, scheduled tour for Jan 18',
                'follow_up_date' => '2026-01-18',
            ],
            [
                'id' => 3,
                'name' => 'Linda Steyn',
                'phone' => '084 777 3333',
                'email' => 'linda.s@email.com',
                'child_age' => '6 months',
                'source' => 'WhatsApp',
                'status' => 'tour_scheduled',
                'created_at' => '2026-01-10',
                'notes' => 'Very interested in baby room',
                'tour_date' => '2026-01-16',
            ],
            [
                'id' => 4,
                'name' => 'Ahmed Hassan',
                'phone' => '072 666 4444',
                'email' => 'ahmed.h@email.com',
                'child_age' => '3 years',
                'source' => 'Referral',
                'status' => 'converted',
                'created_at' => '2026-01-05',
                'notes' => 'Referred by Amanda Botha - application submitted',
            ],
        ];
    }

    public static function events(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Valentine\'s Day Party',
                'date' => '2026-02-14',
                'time' => '10:00',
                'description' => 'Fun activities and crafts celebrating friendship and love.',
                'type' => 'celebration',
            ],
            [
                'id' => 2,
                'title' => 'Parent-Teacher Meeting',
                'date' => '2026-02-20',
                'time' => '14:00',
                'description' => 'Discuss your child\'s progress and development.',
                'type' => 'meeting',
            ],
            [
                'id' => 3,
                'title' => 'Easter Egg Hunt',
                'date' => '2026-04-18',
                'time' => '09:00',
                'description' => 'Annual Easter celebration with games and prizes.',
                'type' => 'celebration',
            ],
            [
                'id' => 4,
                'title' => 'Grade R Graduation',
                'date' => '2026-12-05',
                'time' => '10:00',
                'description' => 'Celebrate our Grade R learners as they prepare for big school.',
                'type' => 'graduation',
            ],
        ];
    }

    public static function newsletters(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'January Newsletter',
                'date' => '2026-01-10',
                'content' => 'Welcome back to a new year at Peekaboo! We have exciting plans for 2026...',
                'pdf_url' => '#',
            ],
            [
                'id' => 2,
                'title' => 'December Holiday Newsletter',
                'date' => '2025-12-15',
                'content' => 'As we close off 2025, we reflect on an amazing year of growth and learning...',
                'pdf_url' => '#',
            ],
        ];
    }

    public static function announcements(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'School Reopens',
                'message' => 'Welcome back! School reopens on Monday, 13 January 2026.',
                'type' => 'info',
                'date' => '2026-01-10',
            ],
            [
                'id' => 2,
                'title' => 'Fee Reminder',
                'message' => 'A friendly reminder that January fees are due by the 1st of the month.',
                'type' => 'warning',
                'date' => '2026-01-05',
            ],
            [
                'id' => 3,
                'title' => 'New Teacher',
                'message' => 'We welcome Teacher Mary to our Toddler class!',
                'type' => 'success',
                'date' => '2026-01-13',
            ],
        ];
    }

    public static function attendance($date = null): array
    {
        return [
            ['child_id' => 1, 'child_name' => 'Emma Botha', 'class' => 'Toddlers', 'check_in' => '07:15', 'check_out' => null, 'status' => 'present'],
            ['child_id' => 2, 'child_name' => 'Arun Naidoo', 'class' => 'Toddlers', 'check_in' => '06:45', 'check_out' => null, 'status' => 'present'],
            ['child_id' => 3, 'child_name' => 'Maya Naidoo', 'class' => 'Toddlers', 'check_in' => '06:45', 'check_out' => null, 'status' => 'present'],
            ['child_id' => 4, 'child_name' => 'Ethan Johnson', 'class' => 'Grade R', 'check_in' => '07:30', 'check_out' => null, 'status' => 'present'],
            ['child_id' => 5, 'child_name' => 'Sipho Khumalo', 'class' => 'Baby Room', 'check_in' => null, 'check_out' => null, 'status' => 'absent'],
        ];
    }

    public static function classes(): array
    {
        return [
            ['id' => 1, 'name' => 'Baby Room', 'teacher' => 'Michelle Peters', 'capacity' => 8, 'enrolled' => 6],
            ['id' => 2, 'name' => 'Toddlers', 'teacher' => 'Nomsa Dlamini', 'capacity' => 12, 'enrolled' => 10],
            ['id' => 3, 'name' => 'Preschool', 'teacher' => 'Thandi Nkosi', 'capacity' => 15, 'enrolled' => 14],
            ['id' => 4, 'name' => 'Grade R', 'teacher' => 'Lisa Thompson', 'capacity' => 20, 'enrolled' => 15],
        ];
    }

    public static function automations(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'New Enquiry Welcome',
                'trigger' => 'New lead submitted',
                'action' => 'Send welcome email + WhatsApp message',
                'status' => 'active',
                'last_triggered' => '2026-01-14 09:30',
                'total_runs' => 45,
            ],
            [
                'id' => 2,
                'name' => 'Application Submitted',
                'trigger' => 'Application form completed',
                'action' => 'Send confirmation email + notify admin',
                'status' => 'active',
                'last_triggered' => '2026-01-12 14:15',
                'total_runs' => 23,
            ],
            [
                'id' => 3,
                'name' => 'Application Approved',
                'trigger' => 'Application status changed to approved',
                'action' => 'Send approval email with welcome pack',
                'status' => 'active',
                'last_triggered' => '2026-01-10 11:00',
                'total_runs' => 18,
            ],
            [
                'id' => 4,
                'name' => 'Payment Reminder',
                'trigger' => '3 days before month end',
                'action' => 'Send payment reminder email + SMS',
                'status' => 'active',
                'last_triggered' => '2025-12-28 08:00',
                'total_runs' => 12,
            ],
            [
                'id' => 5,
                'name' => 'Birthday Wishes',
                'trigger' => 'Child\'s birthday',
                'action' => 'Send birthday email to parents + class announcement',
                'status' => 'active',
                'last_triggered' => '2026-01-11 06:00',
                'total_runs' => 156,
            ],
            [
                'id' => 6,
                'name' => 'Holiday Care Reminder',
                'trigger' => '2 weeks before school holidays',
                'action' => 'Send holiday care booking reminder',
                'status' => 'active',
                'last_triggered' => '2025-12-01 08:00',
                'total_runs' => 4,
            ],
        ];
    }

    public static function auditLog(): array
    {
        return [
            ['id' => 1, 'user' => 'Sarah van der Merwe', 'action' => 'Approved application', 'details' => 'APP-2026-002 - James Pieterse', 'timestamp' => '2026-01-14 10:30'],
            ['id' => 2, 'user' => 'Sarah van der Merwe', 'action' => 'Updated child record', 'details' => 'Emma Botha - Medical notes updated', 'timestamp' => '2026-01-14 09:15'],
            ['id' => 3, 'user' => 'Thandi Nkosi', 'action' => 'Marked attendance', 'details' => 'Preschool class - 14 present, 1 absent', 'timestamp' => '2026-01-14 08:30'],
            ['id' => 4, 'user' => 'System', 'action' => 'Automated email sent', 'details' => 'Payment reminder to 3 parents', 'timestamp' => '2026-01-13 08:00'],
            ['id' => 5, 'user' => 'Sarah van der Merwe', 'action' => 'Recorded payment', 'details' => 'PAY-001 - R4,200 from Amanda Botha', 'timestamp' => '2026-01-12 14:20'],
        ];
    }
}
