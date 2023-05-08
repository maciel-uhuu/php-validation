import { Head, Link, useForm } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function Dashboard({ auth, users }) {
    const { patch, delete: destroy } = useForm();

    const handleDelete = user => {
        if (window.confirm('Are you sure you want to delete this customer?')) {
            destroy(route('user.destroy', user));
        }
    };

    const toggleActive = user => {
        patch(route('user.toggleActive', user));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Clients</h2>}
        >
            <Head title="Clients" />

            <div className="py-8">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="flex justify-end pb-4">
                        <Link
                            href={route('user.create')}
                            className="dark:bg-white px-4 mx-1 py-2 rounded-md font-semibold text-xs uppercase tracking-widest"
                        >Create New Client</Link>
                    </div>
                    {users.map(user => (
                        <div key={user.id} className="my-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center p-6 text-gray-900 dark:text-gray-100">
                            <div>
                                <p>{user.name}</p>
                                <small>at {user.created_at}</small>
                            </div>
                            <div className="flex items-center">
                                <button
                                    type="button"
                                    className={`relative inline-block w-24 h-8 bg-gray-300 rounded-md p-1 transition-transform ${user.active ? 'bg-green-400' : 'bg-red-950'}`}
                                    onClick={() => toggleActive(user)}
                                >
                                    <span className={`absolute inset-0 h-full w-12 rounded-md bg-gray-100 dark:bg-gray-900 transition-transform transform ${user.active ? 'translate-x-full' : 'translate-x-0'}`}></span>
                                    <span className="absolute inset-0 flex items-center uppercase justify-center text-xs font-bold text-white">{user.active ? 'Active' : 'Inactive'}</span>
                                </button>

                                <button
                                    className="dark:bg-red-950 px-4 mx-1 py-2 rounded-md font-semibold text-xs uppercase tracking-widest"
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
