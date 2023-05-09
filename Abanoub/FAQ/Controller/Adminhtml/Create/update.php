<!-- not used till now but it will help update  -->

namespace Abanoub\FAQ\Controller\Adminhtml\Create;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Abanoub\FAQ\Model\FaqRepository;

class Update extends Action
{
    protected $_faqRepository;

    public function __construct(Context $context, FaqRepository $faqRepository)
    {
        $this->_faqRepository = $faqRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $data = ['Priority' => '10'];
        try {
            // Delete the Faq data using the Faq Repository model
            $this->_faqRepository->updateById($id, $data);
            $this->messageManager->addSuccessMessage(__('Selected Row has been Updated .'));
            $this->_redirect('*/*/index');
            return;
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong while saving the Faq.'));
            return;
        }
    }
}
