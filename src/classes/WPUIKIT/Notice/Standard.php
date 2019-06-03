<?php

    namespace WPUIKIT\Notice;

    use WPUIKIT\Finalizer;

    class Standard extends Finalizer {
        protected $message = null;

        public function __construct($message) {
            $this->setFinalizerAction('admin_notices');
            parent::__construct();

            $this->setMessage($message);

        }

        /**
         * @return null
         */
        public function getMessage()
        {
            return $this->message;
        }

        /**
         * @param null $message
         */
        public function setMessage($message)
        {
            $this->message = $message;
        }



        public function finalize() {
            ?>
            <div class="notice">
                <p><?php echo $this->getMessage(); ?></p>
            </div>
            <?php
        }

        public function __toString() {
            // TODO: Implement __toString() method.
            ob_start();
            $this->finalize();
            return ob_get_clean();
        }
    }