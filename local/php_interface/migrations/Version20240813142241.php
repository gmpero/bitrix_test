<?php

namespace Sprint\Migration;


class Version20240813142241 extends Version
{
    protected $author = "admin";

    protected $description   = "";

    protected $moduleVersion = "4.10.4";

    /**
     * @throws Exceptions\MigrationException
     * @throws Exceptions\RestartException
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $this->getExchangeManager()
             ->HlblockElementsImport()
             ->setExchangeResource('hlblock_elements.xml')
             ->setLimit(20)
             ->execute(function ($item) {
                 $this->getHelperManager()
                      ->Hlblock()
                      ->addElement(
                          $item['hlblock_id'],
                          $item['fields']
                      );
             });
    }

    /**
     * @throws Exceptions\MigrationException
     * @throws Exceptions\RestartException
     * @throws Exceptions\HelperException
     * @return bool|void
     */
     public function down()
    {
        $hlblockId = 'Agents'; 
        $elements = $this->getHelperManager()->Hlblock()->getElements($hlblockId);
        foreach ($elements as $element) {
            $this->getHelperManager()->Hlblock()->deleteElement($hlblockId, $element['ID']);
        }
    }


}
