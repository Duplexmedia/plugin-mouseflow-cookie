<?php
namespace MouseflowCookie\Providers;

use Plenty\Plugin\ServiceProvider;

/**
 * Class MouseflowCookieServiceProvider
 * @package MouseflowCookie\Providers
 */
class MouseflowCookieServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		$this->getApplication()->register(MouseflowCookieRouteServicControllerseProvider::class);

        /** @var ConsentRepositoryContract $consentRepository */
        $consentRepository = pluginApp(ConsentRepositoryContract::class);

        $consentRepository->registerConsent(
            'mouseflowCookie',
            'Mouseflow',
            [
                'description' => 'Mouseflow Cookies',
                'provider' => 'Mouseflow ApS',
                'lifespan' => '90 Days',
                'policyUrl' => 'https://mouseflow.com/de/privacy/',
                'group' => 'tracking',
                'necessary' => 'false',
                'isOptOut' => 'true',
                'cookieNames' => ['mf_[session]', 'mf_user']
            ]
        );
	}
}
