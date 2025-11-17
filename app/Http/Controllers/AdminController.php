<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Kropify;
use App\Models\GeneralSetting;

class AdminController extends Controller
{
    public function adminDashboard(Request $request)
    {
        $data = [
            'pageTitle' => 'Home'
        ];
        return view('back.pages.dashboard', $data);
    }

    public function logoutHandler(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('fail', 'You have been logged out successfully.');
    }

    public function profileView(Request $request)
    {
        $data = [
            'pageTitle' => 'Profile'
        ];
        return view('back.pages.profile', $data);
    }

    public function updateProfilePicture(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $path = 'images/users/';
        $file = $request->file('profilePictureFile');
        $old_picture = $user->getAttributes()['picture'];
        $filename = 'IMG_' . uniqid() . '.png';

        $upload = Kropify::getFile($file, $filename)->setPath($path)->useMove()->save();

        if ($upload) {
            // Delete old Profile Picture if exists
            if ($old_picture != null && File::exists(public_path($path . $old_picture))) {
                File::delete(public_path($path . $old_picture));
            }
            // Update Profile Picture in Database
            $user->update(['picture' => $filename]);
            return response()->json(['status' => 1, 'message' => 'Your Profile Picture has been updated successfully!']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
        }
    }

    public function generalSettings(Request $request)
    {
        $data = [
            'pageTitle' => 'General Settings'
        ];
        return view('back.pages.general_settings', $data);
    }

    public function updateLogo(Request $request)
    {
        $settings = GeneralSetting::take(1)->first();

        if (!is_null($settings)) {
            $path = 'images/site/';
            $old_logo = $settings->site_logo;
            $file = $request->file('site_logo');
            $filename = 'logo_' . uniqid() . '.png';

            if ($request->hasFile('site_logo')) {
                $upload = $file->move(public_path($path), $filename);

                if ($upload) {
                    if ($old_logo != null && File::exists(public_path($path . $old_logo))) {
                        File::delete(public_path($path . $old_logo));
                    }

                    $settings->update(['site_logo' => $filename]);

                    return response()->json(['status' => 1, 'image_path' => $path . $filename, 'message' => 'Site Logo has been updated successfully.']);
                } else {
                    return response()->json(['status' => 0, 'message' => 'Something went wrong in uploading new logo']);
                }
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'Make sure you updated general settings form first.']);
        }
    }

    public function updateFavicon(Request $request)
    {
        $settings = GeneralSetting::take(1)->first();

        if (!is_null($settings)) {
            $path = 'images/site/';
            $old_favicon = $settings->site_favicon;
            $file = $request->file('site_favicon');
            $filename = 'favicon_' . uniqid() . '.png';

            if ($request->hasFile('site_favicon')) {
                $upload = $file->move(public_path($path), $filename);

                if ($upload) {
                    if ($old_favicon != null && File::exists(public_path($path . $old_favicon))) {
                        File::delete(public_path($path . $old_favicon));
                    }

                    $settings->update(['site_favicon' => $filename]);

                    return response()->json(['status' => 1, 'image_path' => $path . $filename, 'message' => 'Site Favicon has been updated successfully.']);
                } else {
                    return response()->json(['status' => 0, 'message' => 'Something went wrong in uploading new favicon']);
                }
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'Make sure you updated general settings form first.']);
        }
    }

    public function categoriesPage(Request $request)
    {
        $data = [
            'pageTitle' => 'Categories'
        ];
        return view('back.pages.categories_page', $data);
    }

    public function productsPage(Request $request)
    {
        $data = [
            'pageTitle' => 'Products'
        ];
        return view('back.pages.products_page', $data);
    }

    public function contactUsPage(Request $request)
    {
        $data = [
            'pageTitle' => 'Contact Us'
        ];
        return view('back.pages.contact_us_page', $data);
    }

    public function locationsPage(Request $request)
    {
        $data = [
            'pageTitle' => 'Locations'
        ];
        return view('back.pages.locations_page', $data);
    }
}
