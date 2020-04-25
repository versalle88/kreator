<?php /** @noinspection PhpIllegalPsrClassPathInspection */

namespace spec\Versalle\Framework\FileSystem;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\FileSystem\DirectoryList;

/**
 * Class DirectoryListSpec
 *
 * @noinspection PhpUnused
 */
class DirectoryListSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(FRAMEWORK_ROOT_DIR);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DirectoryList::class);
    }

    function it_gets_framework_root_dir()
    {
        $this->getFrameworkRootDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_boot_dir()
    {
        $this->getFrameworkBootDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'boot' . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_config_dir()
    {
        $this->getFrameworkConfigDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_docs_dir()
    {
        $this->getFrameworkDocsDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'docs' . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_public_dir()
    {
        $this->getFrameworkPublicDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_resources_dir()
    {
        $this->getFrameworkResourcesDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_src_dir()
    {
        $this->getFrameworkSrcDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_tests_dir()
    {
        $this->getFrameworkTestsDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR);
    }

    function it_gets_framework_vendor_dir()
    {
        $this->getFrameworkVendorDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR);
    }

    function it_gets_application_root_dir()
    {
        $this->getApplicationRootDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
    }

    function it_gets_application_config_dir()
    {
        $this->getApplicationConfigDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
    }

    function it_gets_application_modules_dir()
    {
        $this->getApplicationModulesDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);
    }

    function it_gets_application_resources_dir()
    {
        $this->getApplicationResourcesDir()
            ->shouldReturn(FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR);
    }
}
