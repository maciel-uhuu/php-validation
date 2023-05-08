import { useState } from 'react';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function Dashboard({ auth, users }) {
    const { url } = usePage();
    const { patch, delete: destroy } = useForm();
    const [showingOrderByDropdown, setShowingOrderByDropdown] = useState(false);

    const urlSplit = url.split('?');
    const queryString = urlSplit[1];
    const queryParams = new URLSearchParams(queryString);
    const orderBy = queryParams.get('orderBy');
    const direction = queryParams.get('direction');

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
                    <div className="flex justify-between pb-4 space-x-4 items-center">
                        <div className="relative w-48">
                            <button
                                onClick={() => setShowingOrderByDropdown(previousState => !previousState)}
                                className="dark:bg-gray-700 dark:hover:bg-gray-800 dark:text-gray-400 py-2 text-xs px-4 rounded focus:outline-none focus:ring focus:border-blue-300">
                                Order by...
                            </button>
                            <div className={`py-1 absolute top-full left-0 w-full dark:bg-gray-700 dark:text-gray-400 px-2 rounded shadow transition-opacity ${!showingOrderByDropdown ? 'opacity-0 pointer-events-none' : ''}`}>
                                <Link className={`block dark:hover:bg-gray-800 p-1 rounded ${orderBy === 'name' && direction === 'asc' ? 'dark:bg-gray-800 dark:text-gray-400' : ''}`} data={{ orderBy: 'name', direction: 'asc' }}>Name - AZ</Link>
                                <Link className={`block dark:hover:bg-gray-800 p-1 rounded ${orderBy === 'name' && direction === 'desc' ? 'dark:bg-gray-800 dark:text-gray-400' : ''}`} data={{ orderBy: 'name', direction: 'desc' }}>Name - ZA</Link>
                                <Link className={`block dark:hover:bg-gray-800 p-1 rounded ${orderBy === 'created_at' && direction === 'asc' ? 'dark:bg-gray-800 dark:text-gray-400' : ''}`} data={{ orderBy: 'created_at', direction: 'asc' }}>Created At - Older</Link>
                                <Link className={`block dark:hover:bg-gray-800 p-1 rounded ${orderBy === 'created_at' && direction === 'desc' ? 'dark:bg-gray-800 dark:text-gray-400' : ''}`} data={{ orderBy: 'created_at', direction: 'desc' }}>Created At - Last</Link>
                            </div>
                        </div>
                        <p className="dark:text-gray-400">
                            Showing {users.from} to {users.to} of {users.total}
                        </p>
                        <Link
                            href={route('user.create')}
                            className="dark:bg-white px-4 mx-1 py-2 rounded-md font-semibold text-xs uppercase tracking-widest"
                        >Create New Client</Link>
                    </div>
                    <div>
                        {users.data.map(user => (
                            <div key={user.id} className="my-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center px-6 py-2 text-gray-900 dark:text-gray-100">
                                <div>
                                    <p>{user.name}</p>
                                    <small>at {user.created_at}</small>
                                </div>
                                <div className="flex items-center">
                                    <button
                                        type="button"
                                        className={`relative inline-block w-24 h-8 bg-gray-300 rounded-md p-1 mx-1 transition-transform ${user.active ? 'bg-green-400' : 'bg-red-950'}`}
                                        onClick={() => toggleActive(user)}
                                    >
                                        <span className={`absolute inset-0 h-full w-12 rounded-md bg-gray-100 dark:bg-gray-900 transition-transform transform ${user.active ? 'translate-x-full' : 'translate-x-0'}`}></span>
                                        <span className="absolute inset-0 flex items-center uppercase justify-center text-xs font-bold text-white tracking-widest">{user.active ? 'Active' : 'Inactive'}</span>
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
                        <ul className="flex pl-0 mt-6 list-none flex-wrap">
                            {users.links.map((link, index) => (
                                <li key={index}>
                                    <Link
                                        href={link.url}
                                        className={`dark:hover:bg-gray-700 dark:text-white font-semibold text-xs py-2 px-4 mr-1 rounded ${link.active ? 'dark:bg-gray-700' : 'dark:bg-gray-500'}`}
                                    >
                                        <span dangerouslySetInnerHTML={{ __html: link.label }} />
                                    </Link>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
