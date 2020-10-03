<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('home');
// });

// Frontend
Route::get('/', [App\Http\Controllers\Web\Home::class, 'index'])->name('home');

// Violation Reports
Route::post('violation-reports', [App\Http\Controllers\Web\ViolationReports::class, 'store'])->name('violation-reports.store');

// About Page
Route::get('about-company-profile', [App\Http\Controllers\Web\About::class, 'company_profile'])->name('about-company-profile');
Route::get('mission-vision-value', [App\Http\Controllers\Web\About::class, 'mvv'])->name('mission-vision-value');
Route::get('company-milestone', [App\Http\Controllers\Web\About::class, 'milestone'])->name('company-milestone');
Route::get('board-of-commissioners', [App\Http\Controllers\Web\About::class, 'commissioners'])->name('commissioners');
Route::get('board-of-directors', [App\Http\Controllers\Web\About::class, 'directors'])->name('directors');
Route::get('board-of-management', [App\Http\Controllers\Web\About::class, 'management'])->name('management');
Route::get('company-awards', [App\Http\Controllers\Web\About::class, 'awards'])->name('awards');
Route::get('company-cetification', [App\Http\Controllers\Web\About::class, 'certification'])->name('certification');

// Business Page
Route::get('coal-and-mining-service', [App\Http\Controllers\Web\Business::class, 'coal'])->name('coal');
Route::get('mining-infrastructure-and-other-service', [App\Http\Controllers\Web\Business::class, 'infrastructure'])->name('infrastructure');
Route::get('port-management-service', [App\Http\Controllers\Web\Business::class, 'port'])->name('port');
Route::get('company-operational-area', [App\Http\Controllers\Web\Business::class, 'operational'])->name('operational');

// Corporate Governance
Route::get('gcg-practice', [App\Http\Controllers\Web\CorporateGovernance::class, 'gcg'])->name('gcg');
Route::get('company-business-ethics', [App\Http\Controllers\Web\CorporateGovernance::class, 'ethics'])->name('ethics');
Route::get('company-code-of-conduct', [App\Http\Controllers\Web\CorporateGovernance::class, 'coc'])->name('coc');
Route::get('company-integrity-pact', [App\Http\Controllers\Web\CorporateGovernance::class, 'integrity'])->name('integrity');
Route::get('corporate-policy-manual', [App\Http\Controllers\Web\CorporateGovernance::class, 'policy'])->name('policy');
Route::get('whistleblowing-system', [App\Http\Controllers\Web\CorporateGovernance::class, 'whistleblowing'])->name('whistleblowing');
Route::get('audit-committee', [App\Http\Controllers\Web\CorporateGovernance::class, 'audit'])->name('audit');
Route::get('nomination-and-remuneration-committee', [App\Http\Controllers\Web\CorporateGovernance::class, 'nomination'])->name('nomination');
Route::get('risk-management-committee', [App\Http\Controllers\Web\CorporateGovernance::class, 'risk'])->name('risk');

// Corporate Secretary
Route::get('secretary-profile', [App\Http\Controllers\Web\CorporateSecretary::class, 'profile'])->name('profile');
Route::get('shareholders-information', [App\Http\Controllers\Web\CorporateSecretary::class, 'shareholder'])->name('shareholder');
Route::get('general-meeting-of-shareholders', [App\Http\Controllers\Web\CorporateSecretary::class, 'meeting'])->name('meeting');
Route::get('presentation', [App\Http\Controllers\Web\CorporateSecretary::class, 'presentation'])->name('presentation');
Route::get('annual-report', [App\Http\Controllers\Web\CorporateSecretary::class, 'annual_report'])->name('annual_report');
Route::get('financial-statement', [App\Http\Controllers\Web\CorporateSecretary::class, 'financial'])->name('financial');
Route::get('quarterly-newsletter', [App\Http\Controllers\Web\CorporateSecretary::class, 'newsletter'])->name('newsletter');
Route::get('monthly-report', [App\Http\Controllers\Web\CorporateSecretary::class, 'monthly_report'])->name('monthly_report');
Route::get('analyst-coverage', [App\Http\Controllers\Web\CorporateSecretary::class, 'analyst_coverage'])->name('analyst_coverage');
Route::get('press-release', [App\Http\Controllers\Web\CorporateSecretary::class, 'press_release'])->name('press_release');
Route::get('press-release/{id}/{title}', [App\Http\Controllers\Web\CorporateSecretary::class, 'press_release_detail'])->name('press_release_detail');

// Sustainability
Route::get('sustainability-report', [App\Http\Controllers\Web\WebSustainability::class, 'sustainability_report'])->name('sustainability_report');
Route::get('health-safety-environment', [App\Http\Controllers\Web\WebSustainability::class, 'hse'])->name('hse');
Route::get('corporate-social-responsibility', [App\Http\Controllers\Web\WebSustainability::class, 'web_csr'])->name('web_csr');
Route::get('corporate-social-responsibility/{id}/{title}', [App\Http\Controllers\Web\WebSustainability::class, 'web_csr_detail'])->name('web_csr_detail');

// Backend
Auth::routes(['register' => false]);
Route::get('dashboard', [App\Http\Controllers\Administrator\Dashboard::class, 'index'])->name('dashboard');
Route::get('user_logs', [App\Http\Controllers\Administrator\UserLogs::class, 'index'])->name('user_logs');
Route::post('summernote', [App\Http\Controllers\Administrator\Summernote::class, 'upload']);
Route::resource('users', App\Http\Controllers\Administrator\Users::class);
Route::resource('sliders', App\Http\Controllers\Administrator\Sliders::class);

// Address
Route::get('address', [App\Http\Controllers\Administrator\Address::class, 'index'])->name('address.index');
Route::post('address', [App\Http\Controllers\Administrator\Address::class, 'store'])->name('address.store');
Route::put('address/{key}', [App\Http\Controllers\Administrator\Address::class, 'update'])->name('address.update');

// File Manager
Route::get('files', [App\Http\Controllers\Administrator\Files::class, 'index'])->name('files.index');
Route::get('files_all', [App\Http\Controllers\Administrator\Files::class, 'all'])->name('files.all');
Route::post('files', [App\Http\Controllers\Administrator\Files::class, 'store'])->name('files.store');
Route::delete('files/{id}', [App\Http\Controllers\Administrator\Files::class, 'destroy'])->name('files.destroy');

// Website Profile
Route::get('website', [App\Http\Controllers\Administrator\Website::class, 'index'])->name('website.index');
Route::post('website', [App\Http\Controllers\Administrator\Website::class, 'store'])->name('website.store');
Route::put('website/{key}', [App\Http\Controllers\Administrator\Website::class, 'update'])->name('website.update');

// Company Profile
Route::get('company-profile', [App\Http\Controllers\Administrator\CompanyProfile::class, 'index'])->name('company-profile.index');
Route::post('company-profile', [App\Http\Controllers\Administrator\CompanyProfile::class, 'store'])->name('company-profile.store');
Route::put('company-profile/{key}', [App\Http\Controllers\Administrator\CompanyProfile::class, 'update'])->name('company-profile.update');

// Mission, Vision, Value
Route::get('mvv', [App\Http\Controllers\Administrator\MVV::class, 'index'])->name('mvv.index');
Route::post('mvv', [App\Http\Controllers\Administrator\MVV::class, 'store'])->name('mvv.store');
Route::put('mvv/{key}', [App\Http\Controllers\Administrator\MVV::class, 'update'])->name('mvv.update');

// Milestones
Route::resource('milestones', App\Http\Controllers\Administrator\Milestones::class);

// Executives
Route::resource('executives', App\Http\Controllers\Administrator\Executives::class);

// Awards and Certification
Route::resource('awards', App\Http\Controllers\Administrator\Awards::class);

// Coals
Route::resource('coals', App\Http\Controllers\Administrator\Coals::class);

// Infrastructures
Route::resource('infrastructures', App\Http\Controllers\Administrator\Infrastructures::class);

// Port
Route::get('port', [App\Http\Controllers\Administrator\Port::class, 'index'])->name('port.index');
Route::post('port', [App\Http\Controllers\Administrator\Port::class, 'store'])->name('port.store');
Route::put('port/{key}', [App\Http\Controllers\Administrator\Port::class, 'update'])->name('port.update');

// Operational Area
Route::get('operational-area', [App\Http\Controllers\Administrator\OperationalArea::class, 'index'])->name('operational-area.index');
Route::post('operational-area', [App\Http\Controllers\Administrator\OperationalArea::class, 'store'])->name('operational-area.store');
Route::put('operational-area/{key}', [App\Http\Controllers\Administrator\OperationalArea::class, 'update'])->name('operational-area.update');

// Business Ethics
Route::get('business-ethics', [App\Http\Controllers\Administrator\BusinessEthics::class, 'index'])->name('business-ethics.index');
Route::post('business-ethics', [App\Http\Controllers\Administrator\BusinessEthics::class, 'store'])->name('business-ethics.store');
Route::put('business-ethics/{key}', [App\Http\Controllers\Administrator\BusinessEthics::class, 'update'])->name('business-ethics.update');

// Code Of Conduct
Route::get('code-of-conduct', [App\Http\Controllers\Administrator\CodeOfConduct::class, 'index'])->name('code-of-conduct.index');
Route::post('code-of-conduct', [App\Http\Controllers\Administrator\CodeOfConduct::class, 'store'])->name('code-of-conduct.store');
Route::put('code-of-conduct/{key}', [App\Http\Controllers\Administrator\CodeOfConduct::class, 'update'])->name('code-of-conduct.update');

// GCG
Route::get('gcg', [App\Http\Controllers\Administrator\GCG::class, 'index'])->name('gcg.index');
Route::post('gcg', [App\Http\Controllers\Administrator\GCG::class, 'store'])->name('gcg.store');
Route::put('gcg/{key}', [App\Http\Controllers\Administrator\GCG::class, 'update'])->name('gcg.update');

// Integrity Pact
Route::get('integrity-pact', [App\Http\Controllers\Administrator\IntegrityPact::class, 'index'])->name('integrity-pact.index');
Route::post('integrity-pact', [App\Http\Controllers\Administrator\IntegrityPact::class, 'store'])->name('integrity-pact.store');
Route::put('integrity-pact/{key}', [App\Http\Controllers\Administrator\IntegrityPact::class, 'update'])->name('integrity-pact.update');


// Policies
Route::resource('policies', App\Http\Controllers\Administrator\Policies::class);

// Committees
Route::resource('committees', App\Http\Controllers\Administrator\Committees::class);

// Whistleblowing
Route::get('whistleblowing', [App\Http\Controllers\Administrator\Whistleblowing::class, 'index'])->name('whistleblowing.index');
Route::post('whistleblowing', [App\Http\Controllers\Administrator\Whistleblowing::class, 'store'])->name('whistleblowing.store');
Route::put('whistleblowing/{key}', [App\Http\Controllers\Administrator\Whistleblowing::class, 'update'])->name('whistleblowing.update');

// Profile
Route::get('profile', [App\Http\Controllers\Administrator\Profile::class, 'index'])->name('profile.index');
Route::post('profile', [App\Http\Controllers\Administrator\Profile::class, 'store'])->name('profile.store');
Route::put('profile/{key}', [App\Http\Controllers\Administrator\Profile::class, 'update'])->name('profile.update');

// Shareholders
Route::resource('shareholders', App\Http\Controllers\Administrator\Shareholders::class);

// Meetings
Route::resource('meetings', App\Http\Controllers\Administrator\Meetings::class);

// Presentation
Route::resource('presentations', App\Http\Controllers\Administrator\Presentations::class);

// Annual Report
Route::resource('annual-reports', App\Http\Controllers\Administrator\AnnualReports::class);

// Financial Report
Route::resource('financial-reports', App\Http\Controllers\Administrator\FinancialReports::class);

// Financial Report
Route::resource('financial-reports', App\Http\Controllers\Administrator\FinancialReports::class);

// Newsletter
Route::resource('newsletters', App\Http\Controllers\Administrator\Newsletters::class);

// Monthly Reports
Route::resource('monthly-reports', App\Http\Controllers\Administrator\MonthlyReports::class);

// Analyst Coverage
Route::resource('analyst-coverages', App\Http\Controllers\Administrator\AnalystCoverages::class);

// Press Release
Route::resource('blogs', App\Http\Controllers\Administrator\Blogs::class);

// Sustainabilities
Route::resource('sustainablities', App\Http\Controllers\Administrator\Sustainabilities::class);

// Health Safety Environment
Route::get('hse', [App\Http\Controllers\Administrator\HSE::class, 'index'])->name('hse.index');
Route::post('hse', [App\Http\Controllers\Administrator\HSE::class, 'store'])->name('hse.store');
Route::put('hse/{key}', [App\Http\Controllers\Administrator\HSE::class, 'update'])->name('hse.update');

// CSR
Route::resource('csr', App\Http\Controllers\Administrator\CSRs::class);

// CSR Page
Route::get('csr-page', [App\Http\Controllers\Administrator\CSRPage::class, 'index'])->name('csr-page.index');
Route::post('csr-page', [App\Http\Controllers\Administrator\CSRPage::class, 'store'])->name('csr-page.store');
Route::put('csr-page/{key}', [App\Http\Controllers\Administrator\CSRPage::class, 'update'])->name('csr-page.update');

// CSR Galleries
Route::resource('csr-galleries', App\Http\Controllers\Administrator\CSRGalleries::class);
