import { AlertTriangle, Lock } from 'lucide-react'
import Link from 'next/link'

export default function BannedPage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center p-4">
      <div className="max-w-md w-full bg-white rounded-lg shadow-xl overflow-hidden">
        <div className="p-6 sm:p-8">
          <div className="flex flex-col items-center text-center">
            <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 mb-4">
              <Lock className="h-8 w-8 text-red-600" />
            </div>
            <h1 className="text-2xl font-bold text-gray-900 mb-2">Access Denied</h1>
            <p className="text-gray-600 mb-6">We&apos;re sorry, but your account has been banned from accessing this website.</p>
            <div className="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-6">
              <div className="flex items-center">
                <AlertTriangle className="h-6 w-6 text-yellow-500 mr-2" />
                <p className="text-sm text-yellow-700">
                  If you believe this is a mistake, please contact our support team for assistance.
                </p>
              </div>
            </div>
            <div className="space-y-4 w-full">
              <Link 
                href="/contact-support"
                className="block w-full px-4 py-2 text-center text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors"
              >
                Contact Support
              </Link>
              <Link 
                href="/"
                className="block w-full px-4 py-2 text-center text-red-600 bg-transparent border border-red-600 rounded-md hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors"
              >
                Return to Homepage
              </Link>
            </div>
          </div>
        </div>
        <div className="px-6 py-4 bg-gray-50 border-t border-gray-200 text-center">
          <p className="text-xs text-gray-500">
            &copy; {new Date().getFullYear()}   Medira. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  )
}

