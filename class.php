<?php

class example {

    const PI = '3.1415926535897932';

    /**
     * A single instance of this class.
     * @var     object
     * @access  private
     * @since   1.0.0
     */
    private static $_instance = null;

    /**
     * The version number.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_version;

    /**
     * Constructor function.
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function __construct( $version = '1.0.0' ) {
        $this->_version = $version;

    } // End __construct ()

    /**
     * Example function
     * @access  public
     * @since   1.0.0
     * @return void
     */
    public function example_fuction() {
    } // End example_fuction ()

    /**
     * Main class instance
     *
     * Ensures only one instance of this class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return Main class instance
     */
    public static function instance( $file = '', $version = '1.0.0' ) {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self( $file, $version );
        }
        return self::$_instance;
    } // End instance ()

}
