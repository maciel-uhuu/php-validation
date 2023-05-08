import { Head } from '@inertiajs/react';
import RegisterForm from './RegisterForm';
import GuestLayout from '@/Layouts/GuestLayout';

export default function Register() {
    return (
        <GuestLayout>
            <Head title="Register" />
            <RegisterForm />
        </GuestLayout>
    );
}
