import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Dashboard({ auth, users }) {
    const { delete: destroy } = useForm();

    const handleDelete = user => {
        if (window.confirm('Are you sure you want to delete this customer?')) {
            destroy(route('user.destroy', user));
        }
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Clients</h2>}
        >
            <Head title="Clients" />

            <div className="py-8">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {users.map(user => (
                        <div key={user.id} className="my-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center p-6 text-gray-900 dark:text-gray-100">
                            <div>
                                <p>{user.name}</p>
                                <small>at {user.created_at}</small>
                            </div>
                            <div>
                                <button
                                    className="dark:bg-red-950 px-4 mx-1 py-2 rounded-md font-semibold text-xs uppercase tracking-widestF"
                                    onClick={() => handleDelete(user)}
                                >Delete</button>
                                <Link
                                    href={route('user.edit', user)}
                                    className="dark:bg-slate-600 px-4 mx-1 py-2 rounded-md font-semibold text-xs uppercase tracking-widest"
                                >Edit</Link>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
