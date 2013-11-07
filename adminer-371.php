<?php
/** Adminer - Compact database management
 * @link http://www.adminer.org/
 * @author Jakub Vrana, http://www.vrana.cz/
 * @copyright 2007 Jakub Vrana
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 * @version 3.7.1
 */
error_reporting(6135);
$qc = !ereg('^(unsafe_raw)?$', ini_get("filter.default"));
if ($qc || ini_get("filter.default_flags")) {
    foreach (array(
        '_GET',
        '_POST',
        '_COOKIE',
        '_SERVER'
    ) as $X) {
        $Ig = filter_input_array(constant("INPUT$X"), FILTER_UNSAFE_RAW);
        if ($Ig)
            $$X = $Ig;
    }
}
if (function_exists("mb_internal_encoding"))
    mb_internal_encoding("8bit");
if (isset($_GET["file"])) {
    if ($_SERVER["HTTP_IF_MODIFIED_SINCE"]) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }
    header("Expires: " . gmdate("D, d M Y H:i:s", time() + 365 * 24 * 60 * 60) . " GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    if ($_GET["file"] == "favicon.ico") {
        header("Content-Type: image/x-icon");
        echo lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");
    } elseif ($_GET["file"] == "default.css") {
        header("Content-Type: text/css; charset=utf-8");
        echo lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7������Fé��a�'3I��d��!S��:4�+Md�g���ǃ���t��c������b{�H(Ɠєt1�)t�}F�p0��8�\\82�DL>�9`'C��ۗ889�� �xQ��\0�e4��Qʘl��P��V��b���T4�\\�W/����\n��` 7\"h�q��4ZM6�T�\r�r\\��C{h�7\r�x67���J��2.3��9�K��H�,�!m�Ɔo\$�.[\r&�#\$�<��f�)�Z�\0=�r��9��jΪJ��0�c,|�=�������Rs_6��ݷ������Z6�2B�p\\-�1s2��>�� X:\rܺ��3�b����-8SL�����K.��-�ҥ\rH@ml�:��;�����J�0LR�2�!���A��2�	m���0eI��-:U\r��9��MWL�0��GcJv2(��F9�`�<�J�7+˚~���}DJ��HW�SN���e�u]1̥(O�LЪ<l��R[u&��H�3�v��U�t6��\$�6���X\"�<��}:O��<3x�O�8��>����C���1����HR��S�d�9��%�U1�Sn�a|.�ԁ`�8���:#���C�2��*[o��4X~�7j�\\���6/�09�\r�;��;V��n�n���މv��k�HB%�.k\">��[�\n���l��p�9�cFZ�s��|�>6 �5�l1V��ΐ�6����7��:�\"Az��de���\\�5*�մ��]�p[*�Am)Kt[�\n8g=;���2z���|���̣4�t8.���N#�ʲ��B\"�9���%���HQw�qd��F����\$&V��Q#�Q'��_�m�̡�� ���\r��h� Xrt0j5����W���4���ד�m����\"CA�F!�엖h>�b0�0�7;8�4Ka���	\0�p	a���HXF��1:�8�U9H��Ió�;�sQ�7F��cLpXM@e�����吞+g(��73O�3p��b�lEE>�Chb%�D�I8��E'�	#)�=%C��j�Y�1��y�h;cA��6�jK�\r���9�\$|������g-Z�o�\0���z���\$+D���V�w*�W��p�J���\\��F�O�'ɲa1�m,_ڧ\r��1�P�o�;\0�5����e\r& 3��^\r��6�MR2T\0���5?~�5����P>�85h��n�1;��\rRL8`�\\��@��`;z\n�\0�ԃ8��9R�yZP@�ib�?ƭv\$�<�%	A\r�?�\0�Sʥ���� �BÞ4JҨ��:�`#Hi�7ε�+}���v���o�J��Vڰ���9���W�2�Q�\r�T�D`��f�� ��w�L�����I]MKd7*rk*j\nAS��jF��-[ezz�r��ʁfU�3��~\\��Z��Z��{)��>>Ѓp���*����;zDb�w��]�mC\n���訓�KB��B���m@�����ִ>�����wU�*N�(ba�ƶ�@f�v�)��`�\0u�D)mD@/4����9j��������HBm1��I��5D��RuE��9��Aӗ=1b�0��e�y��1��s�;��������-�����]s��5�\\��\n1;���Q�^��b��i�;YJ2�d!s����#�kg�hށ]�W)>V��I�x]�r���;6�JLcpr��d{py�M��-�UVH�5'\nt��в�l���pH���o�e�Z�Ϩ��q�e��X�F�`Gy\r�!�Ww*����D��u�t%���d�Q��/�p�:�ih���t&���P��e,J͌��t�!�O�7��6�GgR���C[��sk�vqU�}y�h�AGV�����|�lF�ޅL^�.��]u&w�!��[jn��n��ڏ[k�C��v����k�rmOɭ��J>��WT�0����\n�pM�C����b�t��VG|oy8�����c�����");
    } elseif ($_GET["file"] == "functions.js") {
        header("Content-Type: text/javascript; charset=utf-8");
        echo lzw_decompress("f:��gCI��\n:��sa�Pi2\nOgc	�e6L����e7�s)Ћ\r��HG�I���3a��s'c��D�i6�N�����2H��8�uF�R�#����r7�#��v}�@��`Q��o5�a�I��,2O'8�R-q:P��S�(�a��*w�(��%��p�<F)�nx8�zA\"�Z-C�e�V'������s��q��;NF�1䭲9��G�ͦ'0�\r���ȿ�9n`�р�X1�݁G3��t�ee9��:Ne��N��OS�z�c��zl�`5����	�3��y��8.�\r���P��\r�@����\\1\r� �\0�@2j8ؗ=.��� -r�á��0���Q�ꊺh�b����`����^9�q�E!� �7)#���*��Q���\0���1���\"�h�>��������-C \"��X��S`\\���F֬h8�����3��`X:O�,�����)�8��<B�NЃ;>9�8��c�<�#0L����9���?�(�R�#�e=���\n���:*��0�D��9C���@��{ZO����8��i�oV�v�k�Ar�8&����..��cH�E�>�H_h����WU�5��1�r*����^�(�b�xܡY1���&XH�6�ؓ.9�x�P�\r.`v4�������8�4daXV�6�F���E�HH�fc-^=���t��x�Y\r�%��xe���Q�,X=1!�sv�j�kQ2��%�W?��Ů���=�dY&ٓ�VX4�ـ�\\�5���Xì!�}��N�gvڃWY*�Q��i&��l��ѵZ#����Ց\rA�\$e�v5o#ޛ�����5gc3MTC�L>v�H������<`���*�]�_��;%�;��V��i�����4X��'��`����i�j0g�O��ۥ�i���9�ƙےd�F���k/lŞ��n��c<b\n��8�`�H��e�}]\$Ҳ��� ��!����C)�\$ ��A��`�\0'���&\0B�!�)���5E)�����o\r��8r`���!2�T��s=�D˩�>\n/�l�����[��ŠP��a�8%���!�1v/��SUcoJ�:�4J+�B���v�J��\r���b{��,|\0��z��c���Y��l�\n��i.��!��)��dm�J����!'��� B\nC\\i\$J�\"���2�+�IkJ���\$����G�y\$#ܲi/�CAb��b�C(�:��UX���2&	�, Q;~/��Ky9��?�\r6��tV���!�6�CP�	hY�E�������l�䏞(ؖT��p'3��C<�dc���?�yC���e0�@&A?�=��%�A:JD&SQ��6R�)A���b`0�@��u9(�!0R\n�F ��� �wC\\����υr��ܙ��#�~��2'\$� :��K�`h��@��Eb�[�~���� T��lf5��BR]�{\"-��\0��L>\r�\$@�\n(&\r��9�\0vh*ɇ��*�X�!_dj�����py������`�jY�wJ�\$�R��(uaM+��n�xs�pU^�Ap`ͤI�H�\n�f�02�)!4a�9	����EwC�����˩ �L�P����Ai�)�p�3�A�u����AI�A�Hu	�!g͕�U����ZU���c�*����M��xf�:��^�Xp+�V�����K�C#+� �Wh�CP!���;�[pn\\%��k\0����,ڨ8�7�xQC\nY\r�b��XvC d\nA�;��lF,_wr�4RP���HA�!�;��&^Ͳ��\"6;����=�#C�I���9f�'�:��DY!��B+�s�xV��8l�Ó�\"�鑃�H�U%\"Z6��u\r�e0[��p���a��.��� +^`�`b�5#CM�\$� �I��˚A�P�5C\r� S�d�WN6H[�SR�����\\+�X�=k��λ׺��S����r^(��oo�7����\\huk�lHaC(m����nRB��Uup��2C1�[�|ٽ�beG0��\"�CG��?\$x7��n��\$Z�=�ZӦ��si5�f��&�,�f�hi�I�y��n�2�0��DvE��T�x��M�{��`ܤ�GN#遂Z,�/�R\$�#\\I-	����|�0�-0��N�P�����;s-�v���҆���nwGt�n����di�H�|��4�(��+�v��&�Ņ�+K����L\nJ\$ԩ����:\\Q<WB\"^���WTIB~��q�ɞ��}�3�ο\":�U����|\r5n(n����� �7��O�D}B}�����\0\r�voܕ���؆_Jl�İ�H3�\"�[ĸ���K�A��`ߖ���N���&(�)\"� f�&�\0�� b��l��F�.jr����J�\"P<\$F�*�|f/�! �O��pR ���F#5g�b���8eRDi��0�P�+*�������k�Z;�pHh��l!�\0\r\nc�o�/��CB�<py�NTH�h�T�	�@��px�\$������48\n��#�NU,���\$P�m��YK��\"H�� �R�L�����D�\0����a�W�`p�����g���lP����o�:L���+\0 ]0�<)��N�xk\n(`c�+r�k{m\"�3.0��H1�e*ZoeB���9\r���\0RLi�Q�U�ԋ`��.����o:�d���T7Q��V ��Dh��W��S1�	��g�*2��,�W)��@�ϰT@C	Q(�,��4�#d<��\0�! �\$��2 {es��+�rʫ����JvY*�HPr\r����T�M\\\\`���v���<�&�n�D\\HH�oj^@��	��<񊆯��8��*#f�*��\r\nT� \\\r��*�T�^*��ɠ�\$�6o�7��Ree8� �粡,ҥ,�,`|9��K2�0r�+ҧ1R��\"� �*�P*��ȆM\\\rb�0\0�Y\"�\"�Ux���`������Q�E\r�~Q@5 �5sZ�^f�R@Q4�d��5�b\0�@�F�b/�8\"	8s�8�<@����l2\$Sh���\n�R\"U�43FNɫ7\"D\r�4�OI3\n\0�\n`�``��� Y2��ob�3��<n6�]<`��\"�� N�\"B2�Z\n��m���E�����\0����Zx�[2�@,��<P�?�\r�8#d<@��JU��K/E�;\$�6��S�DU	l;�,U�LΒ�7fcG\"EG��\$��\"E��3FHƤI���d�=e	!�UHБ23&j�Ȭ�*��%%�%2�,��JQ1H�l0tY3��\$X<C�t�4�_\$\0��>/F�\n�?mF�j�3�p�D��HK�v Ⱥɜ�\0X�*\rʚ��\n0��e\n�%��\ri���O��fl�N��M%]U�Q�Q�L�-��S±T4�!��U5�T\nn�di0#�E��M����i�.��/U���\rZF���j���;���H�☎d`m�ݩ���\n�t��QS	e��|�i����Qt� d�12,���DY�1UQSU��cd����E�)\\����L�	�F\$�@��V�{W6\"LlT��A�\$6ab�O��dr��Lp�c,��esΞ�<2�`�@b�XP\$3�����@˃P,�K�Vխ^����M��L���u�1��@�c��t-�(���`\0�9�n��2sb���/ �Fm�)���Hl5�@�n�l\$�q+�:��/ ���d��,��\n�޵�����.4���\$ �w0\$�d�V0���\"��r��W4678�VtqBau�pÀ�I<\$#�x`�wd�9�^*k�u�ofBEp	g2���f4 ��L!�r=�\0��\"	�\r<��h�������U�%T�h��Bk�#>�'C�p\n��	(�\r��2����\"3�l��Mԋ7�G�x.�,�Uu�%Dt� �w�y^�Mf\" �����(vU�3�u��J^HC_IU�YkS���c_ylc�c]rF���_q�%�W#]@�r�kv�3-�cy��VHJG<�Z��T�@V�8�\$�6�o�2H@�\r��ª\0��=�ݍ���\"3�9z��:K����u��K >����B\$�r�.�J��<K�G~�P�X��QMƹ	X��w\$;��mp�Zp�� �cK!OeOO�?�wp��懤�֠��L��I\n��?9xB�.]O:V����9��.�mW�\0˗s>�*�l'���k��o�ph���x�����v�L`w�1��� ��!�M�4\"�I\$��\"o�\$��>˙Bea\"��D�Bo�ʶ�+� B0Pxp��&��7�|p{|��}7ְ�\$-P�����@b����e����VYmoM�o�\0���Nzn*>�΄�)�����-H�l!����hp�g�� ����&tZ�㜤\0�!��8 ɩ���ZK��@DZG��������F�秩.� ��l��z%��(�x�}��'<��Ū(������<�XZǬ��њ� ɮg�������w��z�z{�e�'{;@噱(&���R�^E�ݛx�宛Y��\"���Mܒ��V��\n�5�zl�zr�[x��˪�����G\$O�W�@����Z�x�����,����be�� 	�f�dƻ�2��EË��I�D�YT�%�k�{�J�\\\r�U N �'�_��ɽ�f|w޵����,�l�7�kt�1R�D>�ЋX�Z��Њ�|y|Z{|�բ��\r��%;�#\0eZ,\rKt\r�>��>\$�>��?�?c�?�+��@�� ���@ʰ���c�q�fc��+�3Ș���؀&x�]�N���*|��b2<lnT��\$�A���Z0.��&��˷��`{�p,�@��&|��ϖ.��.oo��@����1=\$9{��dB;���ה#�:��\$@wң�=���C?� �(�?Ӄ� �G1�|�\"]�\0���5�\0Ej\r��@@*�2KL�#d*��CA�3,K`� ����C��ϭ�������]��\r�L9۝��=<��]�(�jC�) �,���Bf\r��� �-�Rd5��\$\0^�\n4�\0�ڢ��SY�܆�k���4��@�B\0���W��?x(���u}��ڠ�����K~P\r���/�E\"���#��>R�_���\$< ��\r�l�[����*�`�\n����~��b���]���j�B\r�qˣQ꾼+�(�W|���+�ep9�j}R<�w@���db̴�����Qդ��̀�/(稦m��I_�}U<��ո�ЗBy�����_�f�&F͌��F.} zh��y���Fc���rU۫Fq���:�\n��\n%���`��D@�{��������s/wh]Bz\"J��#���f������TC�����_��dZؠ�֣m2n�nC��K�G\\9(�B�o�� ���S�#��|���d)E��ހ�|��,��bg�1�N�1u�P91�\0��T\0�<�p>iJ����6p\r-���S0�t��HJ�`�7Dc���p)�\nߢ\\����%�a���Q�� �C�f���������6\n�e���\n>�@%h�%I	�`�\0�uAX�K��	`�8+��I\\(�\rń�\0�l�H#]*y\$���,H�?E�F�C7�`țE@rG�p�LB3H,�0�+�s\r\0�\0�!�9�Hua4��� �0�aJ�(�\0��Dq�g��aJ!��m~A�a&à�/ *p��\"�I��BD�\r!�9!v�L�:��Ċ�!\$��A�K����e��\0�l�b	i��6%�YzKrlRK�\"AF{ 6��XH�&�:h~��9��_�2Ws>���\$�Ћ���� ���p�C@vz�0����և8��\\�v���p:s_\\��:��Y\rB����\$|���i�G���R#�	YR9�\0D28?��+}Y���ᩇJ#�C�iV�CT6�Q9���pite�L��p\$�4�\$D#�@@��<A��Pܑ��\0�f�!����а�)B2YZ\0�.���S��(����.� 4b1�H��`س�Y)��R�Ă����`1�g����H:B]�O#8�K���\n�jD%C*I\$Ai���N,�0	 K(\0�T��`\n2OB7����4Q�CH	��4@��� )\$\0	�Jq���+��K�e��&.�J'p�=p��Q�����[xXb� <E�'D�#���`3����60@@�ڦ�� `|�R쀾�5��.�� ����?#?�lS\"!�jE��q�\0�� ���Q���\r�T#<����?1��(HB��FL��[|�@LE�܆�&Q�:yĎ���Fh4q�����U���\"!C1��FJ8#@��f:dё8#2C�8�2.\$�Cb��|\$�0���r�I\0��,��00�K�e!�N��i@d|�5��h`��	T��U2Nj��i��0�Udk��*&j�F8*�E����zcά��Ηs���Â�5��7�\n\r��U�,�2�`�� @�����@X��*�p:-,\rRZ�L�,ʃ|���l�^�O�0�	BC��R�n���V���� ��T�]�Mr�����#���y�\\\"y�\$���/ r*h��%�1�K����ρ|R`b�B�8�r�1��n\0��		�\r�U8�l�tB��(����\0003:����%��-|�\0�eTH\"H�q4(�N\\jc������T�H\n�\0��m�3�?1S:>|g���Rc������\r�F8Q&�@5r\0��XV�5�\\�f�h@v,����/\0\n&�/!��dq��KR����m;�aD2���d\0002��b\$	�L�/1��,�E�4���@<�}aی�\$��1*���`�>0� :��d 	-	Ä\rD�Yl(6[6�k�sf��' 8I��T�JDUD:A�2�hd\0a\0����)2�:��B3:����Z1=���@�-qN\\!�\$�k�f���N�w	������`�n\$L�CR�����5�pc�E3Ca��\0=�Hjڒg����-ژ�E�e�.\0�!o�,�'�w�I`\\s6�R��E�}e0F\\��m�|F>q ?jД�6i��p	��+�N���������9��qu��p�2eɑ��m�.�+L~\$\"���R�s]i��qC�И<T(i��یQ��bt�\"��N�B��mư�@r���xMM�q�#Oj /	 L�D�K�.��t0tI�eB��j��1���6�0~s�74�bQ�Q�!�2��Ԗ��Ǽ�D��H��2��P��d�mM�� DֈF�fȹ\r�Dj\$��L�[\0�`����<@m�V~9� v�4��=!����2�ْ�6�'��*D������#��\0��{��'�2�lLR�J����ўX�ë,E�(C�\\�G����;/�����R�\$��d��\$�QJ`τ!Ү��K�\n|�9�T�dx�@�h!'���E��-�v}b�;|cfL�����YARO�ڇ|3�Eg�zQf�@�l��/i����o�E�ŗgo^q�\nAaΔg˰!��@�R��4��1lE!�p��H0�jb��q�A��a�@xT���ݙ\0\r�F����45H�Zm=�x�F�C̙���v?C��L�2�}hfX��\$`I��b�\0ĭ7�G��Dũ�βfP9U��`\"�����\r���IjԍʶT�\rUz��*��T��!CI`���X2 �Q��k#ԅ\ne�e�+[l~:��~�hn	�h�'͙ΧUV���N�WL��ՋQ=)nI�������҄�^Y���pU�O�AXZ�U�����S�����\\��@Cr�\"���̈́;�^E��-�x\r��\\�P������v!I:Z	�\\�_�2CP�tWY��̰ �_]�a+�=s���]�uC-h�* ���Һ	{���+�Z���D\$�c\$-v�B�P�.���s¤�2�R��j[Z�/Q�Q:����1Y�+ھ�ھ�!�S�b���9�Zy���b,�t0��f=@�\r�-��\nB-ɟ0�&2_�9����hM,ב2�H�oT���lbd����� \0�[�\"�%A־�4;2͒d.��˗H�Zb545H�\\�ʓT��A������RBʄ֤�-��l��Jsύ�6\"� Ȃk=������<�>��jZg�x`�6��t�.���b,�ͩ��k��Y�\\`'��Sl�jհ!ln���\0Wg+:+�c6~����KF�ʖĩ-���h9-��H@SD�G�;�Π���_��	\n�)��fn���Q�-*�C֩���{�MSnZED\0)��Pg]���6���b%�%���Hj&%-* 9}�j43@�*(m�\$QD��ۆ��ҹ(��m¼ukjO�\" ,1����Vv�%s�1k�P�`�	���/�@��0>F�>#��X��8%�lⴹK��S|�Yw0u̧bÉ�X4p\0\n�������%�\0Z�Q2W�WE�k��oɇ�j�y�	�.Z\0�	Pp�t�H���R�>��,%)�k����`|��,prZ�h���Z,P���|���CFL�x�n�� ���.���PRe��V�oB;xD���k�)�M?n�`��/�5Il�qh\0�צ�5Eh�q�폴���A�ˉU��d��kD��Oy;���Ɔ�ë�A.Or�Ƅ�!��H��^ҋD3�I��g��>���c��e~��Z�o������n�_^�+��!��h�|*3ޢ�G���[�n����ڶ�j��p�����7H�/��T��+��3��lP{<2���ʞЩ�)\"ãލ���Yˣ�A2��:���&\0ۃ~cK���\n��D�4�GN�g.`�RB1�H.j�{��}n�|���/��o�����`]��f_6�y`�\r x^@����\\R�=�'ς��_{X-���\\)L�E��������P��l\\\0]��hareӝ8�N����G^��I:����ܵ�J%r�~�-܍	1�g��+gV�oσ�zm��>54�)�m���m�\$o�Eb����ܒ)m�E�Ѩ���K6!*\n��Ӕq�	��0?��w��PK��g�1�i��~X`\0X��Y�	�Z *Dh���1E�l�����\r\0:?\r>��#2�@�3�h2��袰��Æ&��O�е.�Ʉ��(.L<r����K�#���@A��[,L�5�4��<!�r���,��YI�H��d)+l�\$U\\|���'��ݣT���\0�'���\$�;\0����Q��w�ֹ~⌴0qt^2y�����L.����a{�(�!��*\0i~?9�ÄG�l2�3�v4�?f[r�Ԇ;A�Yn��)�� �&���P�2D@���� �]�w�K2�x� .�p��[4�u6�(�} J3�\0x\\�T\\)!�>bV����Eь�s���:��8�8{�>χ�A�o��Hry�����S�d�vm�r׃f���>jO�\n�À�5��ֳ͂A�0���0�2�>n����f����16q3���]+�a�r�F��x6	S-3e�+�x��̤��/j�hD\r��-\n�ј��G7����z2i���.�A9��f`�Y��T�x�9���\"^\\�n���ݣs�9������{0s�83�\$�:#��3��Y�6�{0�\n�J\$�#D�\\�ļ�����@�Ў�3u�0��\"*��.rs���؛�����5����G_ȎD�dH�Km]���\\4\0;d}��[S2ܜ����}ޞ���Kd�& t�rf	*j�+�Px��܍\r��7�M8A�[#��m��\n�\n𧀯9��+�Z���H�|H[��_�ź�|���j5H�|���U1��^�u]��P L`X�gh �_r���s�m�Z:l]ih�s�K��>����e�c9��p7�j�C��L���Rp``�������");
    } else {
        header("Content-Type: image/gif");
        switch ($_GET["file"]) {
            case "plus.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0!�����M��*)�o��) q��e���#��L�\0;";
                break;
            case "cross.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0#�����#\na�Fo~y�.�_wa��1�J�G�L�6]\0\0;";
                break;
            case "up.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0 �����MQN\n�}��a8�y�aŶ�\0��\0;";
                break;
            case "down.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0 �����M��*)�[W�\\��L&ٜƶ�\0��\0;";
                break;
            case "arrow.gif":
                echo "GIF89a\0\n\0�\0\0������!�\0\0\0,\0\0\0\0\0\n\0\0�i������Ӳ޻\0\0;";
                break;
        }
    }
    exit;
}
function connection()
{
    global $i;
    return $i;
}
function adminer()
{
    global $b;
    return $b;
}
function idf_unescape($t)
{
    $pd = substr($t, -1);
    return str_replace($pd . $pd, $pd, substr($t, 1, -1));
}
function escape_string($X)
{
    return substr(q($X), 1, -1);
}
function remove_slashes($We, $qc = false)
{
    if (get_magic_quotes_gpc()) {
        while (list($x, $X) = each($We)) {
            foreach ($X as $hd => $W) {
                unset($We[$x][$hd]);
                if (is_array($W)) {
                    $We[$x][stripslashes($hd)] = $W;
                    $We[] =& $We[$x][stripslashes($hd)];
                } else
                    $We[$x][stripslashes($hd)] = ($qc ? $W : stripslashes($W));
            }
        }
    }
}
function bracket_escape($t, $Ca = false)
{
    static $vg = array(':' => ':1', ']' => ':2', '[' => ':3');
    return strtr($t, ($Ca ? array_flip($vg) : $vg));
}
function h($O)
{
    return htmlspecialchars(str_replace("\0", "", $O), ENT_QUOTES);
}
function nbsp($O)
{
    return (trim($O) != "" ? h($O) : "&nbsp;");
}
function nl_br($O)
{
    return str_replace("\n", "<br>", $O);
}
function checkbox($B, $Y, $Pa, $md = "", $je = "", $Sa = "")
{
    $I = "<input type='checkbox' name='$B' value='" . h($Y) . "'" . ($Pa ? " checked" : "") . ($je ? ' onclick="' . h($je) . '"' : '') . ">";
    return ($md != "" || $Sa ? "<label" . ($Sa ? " class='$Sa'" : "") . ">$I" . h($md) . "</label>" : $I);
}
function optionlist($ne, $Af = null, $Og = false)
{
    $I = "";
    foreach ($ne as $hd => $W) {
        $oe = array(
            $hd => $W
        );
        if (is_array($W)) {
            $I .= '<optgroup label="' . h($hd) . '">';
            $oe = $W;
        }
        foreach ($oe as $x => $X)
            $I .= '<option' . ($Og || is_string($x) ? ' value="' . h($x) . '"' : '') . (($Og || is_string($x) ? (string) $x : $X) === $Af ? ' selected' : '') . '>' . h($X);
        if (is_array($W))
            $I .= '</optgroup>';
    }
    return $I;
}
function html_select($B, $ne, $Y = "", $ie = true)
{
    if ($ie)
        return "<select name='" . h($B) . "'" . (is_string($ie) ? ' onchange="' . h($ie) . '"' : "") . ">" . optionlist($ne, $Y) . "</select>";
    $I = "";
    foreach ($ne as $x => $X)
        $I .= "<label><input type='radio' name='" . h($B) . "' value='" . h($x) . "'" . ($x == $Y ? " checked" : "") . ">" . h($X) . "</label>";
    return $I;
}
function confirm($jb = "")
{
    return " onclick=\"return confirm('" . lang(0) . ($jb ? " (' + $jb + ')" : "") . "');\"";
}
function print_fieldset($Oc, $ud, $Xg = false, $je = "")
{
    echo "<fieldset><legend><a href='#fieldset-$Oc' onclick=\"" . h($je) . "return !toggle('fieldset-$Oc');\">$ud</a></legend><div id='fieldset-$Oc'" . ($Xg ? "" : " class='hidden'") . ">\n";
}
function bold($Ja)
{
    return ($Ja ? " class='active'" : "");
}
function odd($I = ' class="odd"')
{
    static $s = 0;
    if (!$I)
        $s = -1;
    return ($s++ % 2 ? $I : '');
}
function js_escape($O)
{
    return addcslashes($O, "\r\n'\\/");
}
function json_row($x, $X = null)
{
    static $rc = true;
    if ($rc)
        echo "{";
    if ($x != "") {
        echo ($rc ? "" : ",") . "\n\t\"" . addcslashes($x, "\r\n\"\\") . '": ' . ($X !== null ? '"' . addcslashes($X, "\r\n\"\\") . '"' : 'undefined');
        $rc = false;
    } else {
        echo "\n}\n";
        $rc = true;
    }
}
function ini_bool($Xc)
{
    $X = ini_get($Xc);
    return (eregi('^(on|true|yes)$', $X) || (int) $X);
}
function sid()
{
    static $I;
    if ($I === null)
        $I = (SID && !($_COOKIE && ini_bool("session.use_cookies")));
    return $I;
}
function q($O)
{
    global $i;
    return $i->quote($O);
}
function get_vals($G, $f = 0)
{
    global $i;
    $I = array();
    $H = $i->query($G);
    if (is_object($H)) {
        while ($J = $H->fetch_row())
            $I[] = $J[$f];
    }
    return $I;
}
function get_key_vals($G, $j = null)
{
    global $i;
    if (!is_object($j))
        $j = $i;
    $I = array();
    $H = $j->query($G);
    if (is_object($H)) {
        while ($J = $H->fetch_row())
            $I[$J[0]] = $J[1];
    }
    return $I;
}
function get_rows($G, $j = null, $n = "<p class='error'>")
{
    global $i;
    $eb = (is_object($j) ? $j : $i);
    $I  = array();
    $H  = $eb->query($G);
    if (is_object($H)) {
        while ($J = $H->fetch_assoc())
            $I[] = $J;
    } elseif (!$H && !is_object($j) && $n && defined("PAGE_HEADER"))
        echo $n . error() . "\n";
    return $I;
}
function unique_array($J, $v)
{
    foreach ($v as $u) {
        if (ereg("PRIMARY|UNIQUE", $u["type"])) {
            $I = array();
            foreach ($u["columns"] as $x) {
                if (!isset($J[$x]))
                    continue 2;
                $I[$x] = $J[$x];
            }
            return $I;
        }
    }
}
function where($Z, $p = array())
{
    global $w;
    $I  = array();
    $Bc = '(^[\w\(]+' . str_replace("_", ".*", preg_quote(idf_escape("_"))) . '\)+$)';
    foreach ((array) $Z["where"] as $x => $X) {
        $x   = bracket_escape($x, 1);
        $f   = (preg_match($Bc, $x) ? $x : idf_escape($x));
        $I[] = $f . (($w == "sql" && ereg('^[0-9]*\\.[0-9]*$', $X)) || $w == "mssql" ? " LIKE " . q(addcslashes($X, "%_\\")) : " = " . unconvert_field($p[$x], q($X)));
        if ($w == "sql" && ereg("[^ -@]", $X))
            $I[] = "$f = " . q($X) . " COLLATE utf8_bin";
    }
    foreach ((array) $Z["null"] as $x)
        $I[] = (preg_match($Bc, $x) ? $x : idf_escape($x)) . " IS NULL";
    return implode(" AND ", $I);
}
function where_check($X, $p = array())
{
    parse_str($X, $Oa);
    remove_slashes(array(
        &$Oa
    ));
    return where($Oa, $p);
}
function where_link($s, $f, $Y, $ke = "=")
{
    return "&where%5B$s%5D%5Bcol%5D=" . urlencode($f) . "&where%5B$s%5D%5Bop%5D=" . urlencode(($Y !== null ? $ke : "IS NULL")) . "&where%5B$s%5D%5Bval%5D=" . urlencode($Y);
}
function convert_fields($g, $p, $L = array())
{
    $I = "";
    foreach ($g as $x => $X) {
        if ($L && !in_array(idf_escape($x), $L))
            continue;
        $ya = convert_field($p[$x]);
        if ($ya)
            $I .= ", $ya AS " . idf_escape($x);
    }
    return $I;
}
function cookie($B, $Y)
{
    global $ba;
    $Ae = array(
        $B,
        (ereg("\n", $Y) ? "" : $Y),
        time() + 2592000,
        preg_replace('~\\?.*~', '', $_SERVER["REQUEST_URI"]),
        "",
        $ba
    );
    if (version_compare(PHP_VERSION, '5.2.0') >= 0)
        $Ae[] = true;
    return call_user_func_array('setcookie', $Ae);
}
function restart_session()
{
    if (!ini_bool("session.use_cookies"))
        session_start();
}
function stop_session()
{
    if (!ini_bool("session.use_cookies"))
        session_write_close();
}
function &get_session($x)
{
    return $_SESSION[$x][DRIVER][SERVER][$_GET["username"]];
}
function set_session($x, $X)
{
    $_SESSION[$x][DRIVER][SERVER][$_GET["username"]] = $X;
}
function auth_url($Db, $M, $V, $m = null)
{
    global $Eb;
    preg_match('~([^?]*)\\??(.*)~', remove_from_uri(implode("|", array_keys($Eb)) . "|username|" . ($m !== null ? "db|" : "") . session_name()), $A);
    return "$A[1]?" . (sid() ? SID . "&" : "") . ($Db != "server" || $M != "" ? urlencode($Db) . "=" . urlencode($M) . "&" : "") . "username=" . urlencode($V) . ($m != "" ? "&db=" . urlencode($m) : "") . ($A[2] ? "&$A[2]" : "");
}
function is_ajax()
{
    return ($_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest");
}
function redirect($_, $Jd = null)
{
    if ($Jd !== null) {
        restart_session();
        $_SESSION["messages"][preg_replace('~^[^?]*~', '', ($_ !== null ? $_ : $_SERVER["REQUEST_URI"]))][] = $Jd;
    }
    if ($_ !== null) {
        if ($_ == "")
            $_ = ".";
        header("Location: $_");
        exit;
    }
}
function query_redirect($G, $_, $Jd, $cf = true, $dc = true, $kc = false)
{
    global $i, $n, $b;
    $lg = "";
    if ($dc) {
        $Mf = microtime();
        $kc = !$i->query($G);
        $lg = "; -- " . format_time($Mf, microtime());
    }
    $Kf = "";
    if ($G)
        $Kf = $b->messageQuery($G . $lg);
    if ($kc) {
        $n = error() . $Kf;
        return false;
    }
    if ($cf)
        redirect($_, $Jd . $Kf);
    return true;
}
function queries($G = null)
{
    global $i;
    static $Ze = array();
    if ($G === null)
        return implode("\n", $Ze);
    $Mf   = microtime();
    $I    = $i->query($G);
    $Ze[] = (ereg(';$', $G) ? "DELIMITER ;;\n$G;\nDELIMITER " : $G) . "; -- " . format_time($Mf, microtime());
    return $I;
}
function apply_queries($G, $R, $Yb = 'table')
{
    foreach ($R as $P) {
        if (!queries("$G " . $Yb($P)))
            return false;
    }
    return true;
}
function queries_redirect($_, $Jd, $cf)
{
    return query_redirect(queries(), $_, $Jd, $cf, false, !$cf);
}
function format_time($Mf, $Sb)
{
    return lang(1, max(0, array_sum(explode(" ", $Sb)) - array_sum(explode(" ", $Mf))));
}
function remove_from_uri($_e = "")
{
    return substr(preg_replace("~(?<=[?&])($_e" . (SID ? "" : "|" . session_name()) . ")=[^&]*&~", '', "$_SERVER[REQUEST_URI]&"), 0, -1);
}
function pagination($D, $nb)
{
    return " " . ($D == $nb ? $D + 1 : '<a href="' . h(remove_from_uri("page") . ($D ? "&page=$D" : "")) . '">' . ($D + 1) . "</a>");
}
function get_file($x, $ub = false)
{
    $oc = $_FILES[$x];
    if (!$oc)
        return null;
    foreach ($oc as $x => $X)
        $oc[$x] = (array) $X;
    $I = '';
    foreach ($oc["error"] as $x => $n) {
        if ($n)
            return $n;
        $B  = $oc["name"][$x];
        $sg = $oc["tmp_name"][$x];
        $fb = file_get_contents($ub && ereg('\\.gz$', $B) ? "compress.zlib://$sg" : $sg);
        if ($ub) {
            $Mf = substr($fb, 0, 3);
            if (function_exists("iconv") && ereg("^\xFE\xFF|^\xFF\xFE", $Mf, $jf))
                $fb = iconv("utf-16", "utf-8", $fb);
            elseif ($Mf == "\xEF\xBB\xBF")
                $fb = substr($fb, 3);
        }
        $I .= $fb . "\n\n";
    }
    return $I;
}
function upload_error($n)
{
    $Gd = ($n == UPLOAD_ERR_INI_SIZE ? ini_get("upload_max_filesize") : 0);
    return ($n ? lang(2) . ($Gd ? " " . lang(3, $Gd) : "") : lang(4));
}
function repeat_pattern($He, $vd)
{
    return str_repeat("$He{0,65535}", $vd / 65535) . "$He{0," . ($vd % 65535) . "}";
}
function is_utf8($X)
{
    return (preg_match('~~u', $X) && !preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~', $X));
}
function shorten_utf8($O, $vd = 80, $Tf = "")
{
    if (!preg_match("(^(" . repeat_pattern("[\t\r\n -\x{FFFF}]", $vd) . ")($)?)u", $O, $A))
        preg_match("(^(" . repeat_pattern("[\t\r\n -~]", $vd) . ")($)?)", $O, $A);
    return h($A[1]) . $Tf . (isset($A[2]) ? "" : "<i>...</i>");
}
function friendly_url($X)
{
    return preg_replace('~[^a-z0-9_]~i', '-', $X);
}
function hidden_fields($We, $Qc = array())
{
    while (list($x, $X) = each($We)) {
        if (is_array($X)) {
            foreach ($X as $hd => $W)
                $We[$x . "[$hd]"] = $W;
        } elseif (!in_array($x, $Qc))
            echo '<input type="hidden" name="' . h($x) . '" value="' . h($X) . '">';
    }
}
function hidden_fields_get()
{
    echo (sid() ? '<input type="hidden" name="' . session_name() . '" value="' . h(session_id()) . '">' : ''), (SERVER !== null ? '<input type="hidden" name="' . DRIVER . '" value="' . h(SERVER) . '">' : ""), '<input type="hidden" name="username" value="' . h($_GET["username"]) . '">';
}
function table_status1($P, $lc = false)
{
    $I = table_status($P, $lc);
    return ($I ? $I : array(
        "Name" => $P
    ));
}
function column_foreign_keys($P)
{
    global $b;
    $I = array();
    foreach ($b->foreignKeys($P) as $q) {
        foreach ($q["source"] as $X)
            $I[$X][] = $q;
    }
    return $I;
}
function enum_input($T, $_a, $o, $Y, $Rb = null)
{
    global $b;
    preg_match_all("~'((?:[^']|'')*)'~", $o["length"], $Bd);
    $I = ($Rb !== null ? "<label><input type='$T'$_a value='$Rb'" . ((is_array($Y) ? in_array($Rb, $Y) : $Y === 0) ? " checked" : "") . "><i>" . lang(5) . "</i></label>" : "");
    foreach ($Bd[1] as $s => $X) {
        $X  = stripcslashes(str_replace("''", "'", $X));
        $Pa = (is_int($Y) ? $Y == $s + 1 : (is_array($Y) ? in_array($s + 1, $Y) : $Y === $X));
        $I .= " <label><input type='$T'$_a value='" . ($s + 1) . "'" . ($Pa ? ' checked' : '') . '>' . h($b->editVal($X, $o)) . '</label>';
    }
    return $I;
}
function input($o, $Y, $r)
{
    global $i, $U, $b, $w;
    $B = h(bracket_escape($o["field"]));
    echo "<td class='function'>";
    $mf = ($w == "mssql" && $o["auto_increment"]);
    if ($mf && !$_POST["save"])
        $r = null;
    $Cc = (isset($_GET["select"]) || $mf ? array(
        "orig" => lang(6)
    ) : array()) + $b->editFunctions($o);
    $_a = " name='fields[$B]'";
    if ($o["type"] == "enum")
        echo nbsp($Cc[""]) . "<td>" . $b->editInput($_GET["edit"], $o, $_a, $Y);
    else {
        $rc = 0;
        foreach ($Cc as $x => $X) {
            if ($x === "" || !$X)
                break;
            $rc++;
        }
        $ie = ($rc ? " onchange=\"var f = this.form['function[" . h(js_escape(bracket_escape($o["field"]))) . "]']; if ($rc > f.selectedIndex) f.selectedIndex = $rc;\"" : "");
        $_a .= $ie;
        echo (count($Cc) > 1 ? html_select("function[$B]", $Cc, $r === null || in_array($r, $Cc) || isset($Cc[$r]) ? $r : "", "functionChange(this);") : nbsp(reset($Cc))) . '<td>';
        $Zc = $b->editInput($_GET["edit"], $o, $_a, $Y);
        if ($Zc != "")
            echo $Zc;
        elseif ($o["type"] == "set") {
            preg_match_all("~'((?:[^']|'')*)'~", $o["length"], $Bd);
            foreach ($Bd[1] as $s => $X) {
                $X  = stripcslashes(str_replace("''", "'", $X));
                $Pa = (is_int($Y) ? ($Y >> $s) & 1 : in_array($X, explode(",", $Y), true));
                echo " <label><input type='checkbox' name='fields[$B][$s]' value='" . (1 << $s) . "'" . ($Pa ? ' checked' : '') . "$ie>" . h($b->editVal($X, $o)) . '</label>';
            }
        } elseif (ereg('blob|bytea|raw|file', $o["type"]) && ini_bool("file_uploads"))
            echo "<input type='file' name='fields-$B'$ie>";
        elseif (($jg = ereg('text|lob', $o["type"])) || ereg("\n", $Y)) {
            if ($jg && $w != "sqlite")
                $_a .= " cols='50' rows='12'";
            else {
                $K = min(12, substr_count($Y, "\n") + 1);
                $_a .= " cols='30' rows='$K'" . ($K == 1 ? " style='height: 1.2em;'" : "");
            }
            echo "<textarea$_a>" . h($Y) . '</textarea>';
        } else {
            $Id = (!ereg('int', $o["type"]) && preg_match('~^(\\d+)(,(\\d+))?$~', $o["length"], $A) ? ((ereg("binary", $o["type"]) ? 2 : 1) * $A[1] + ($A[3] ? 1 : 0) + ($A[2] && !$o["unsigned"] ? 1 : 0)) : ($U[$o["type"]] ? $U[$o["type"]] + ($o["unsigned"] ? 0 : 1) : 0));
            if ($w == 'sql' && $i->server_info >= 5.6 && ereg('time', $o["type"]))
                $Id += 7;
            echo "<input" . (ereg('int', $o["type"]) ? " type='number'" : "") . " value='" . h($Y) . "'" . ($Id ? " maxlength='$Id'" : "") . (ereg('char|binary', $o["type"]) && $Id > 20 ? " size='40'" : "") . "$_a>";
        }
    }
}
function process_input($o)
{
    global $b;
    $t = bracket_escape($o["field"]);
    $r = $_POST["function"][$t];
    $Y = $_POST["fields"][$t];
    if ($o["type"] == "enum") {
        if ($Y == -1)
            return false;
        if ($Y == "")
            return "NULL";
        return +$Y;
    }
    if ($o["auto_increment"] && $Y == "")
        return null;
    if ($r == "orig")
        return ($o["on_update"] == "CURRENT_TIMESTAMP" ? idf_escape($o["field"]) : false);
    if ($r == "NULL")
        return "NULL";
    if ($o["type"] == "set")
        return array_sum((array) $Y);
    if (ereg('blob|bytea|raw|file', $o["type"]) && ini_bool("file_uploads")) {
        $oc = get_file("fields-$t");
        if (!is_string($oc))
            return false;
        return q($oc);
    }
    return $b->processInput($o, $Y, $r);
}
function search_tables()
{
    global $b, $i;
    $_GET["where"][0]["op"]  = "LIKE %%";
    $_GET["where"][0]["val"] = $_POST["query"];
    $xc                      = false;
    foreach (table_status('', true) as $P => $Q) {
        $B = $b->tableName($Q);
        if (isset($Q["Engine"]) && $B != "" && (!$_POST["tables"] || in_array($P, $_POST["tables"]))) {
            $H = $i->query("SELECT" . limit("1 FROM " . table($P), " WHERE " . implode(" AND ", $b->selectSearchProcess(fields($P), array())), 1));
            if (!$H || $H->fetch_row()) {
                if (!$xc) {
                    echo "<ul>\n";
                    $xc = true;
                }
                echo "<li>" . ($H ? "<a href='" . h(ME . "select=" . urlencode($P) . "&where[0][op]=" . urlencode($_GET["where"][0]["op"]) . "&where[0][val]=" . urlencode($_GET["where"][0]["val"])) . "'>$B</a>\n" : "$B: <span class='error'>" . error() . "</span>\n");
            }
        }
    }
    echo ($xc ? "</ul>" : "<p class='message'>" . lang(7)) . "\n";
}
function dump_headers($Pc, $Rd = false)
{
    global $b;
    $I  = $b->dumpHeaders($Pc, $Rd);
    $ye = $_POST["output"];
    if ($ye != "text")
        header("Content-Disposition: attachment; filename=" . $b->dumpFilename($Pc) . ".$I" . ($ye != "file" && !ereg('[^0-9a-z]', $ye) ? ".$ye" : ""));
    session_write_close();
    ob_flush();
    flush();
    return $I;
}
function dump_csv($J)
{
    foreach ($J as $x => $X) {
        if (preg_match("~[\"\n,;\t]~", $X) || $X === "")
            $J[$x] = '"' . str_replace('"', '""', $X) . '"';
    }
    echo implode(($_POST["format"] == "csv" ? "," : ($_POST["format"] == "tsv" ? "\t" : ";")), $J) . "\r\n";
}
function apply_sql_function($r, $f)
{
    return ($r ? ($r == "unixepoch" ? "DATETIME($f, '$r')" : ($r == "count distinct" ? "COUNT(DISTINCT " : strtoupper("$r(")) . "$f)") : $f);
}
function password_file($k)
{
    $Ab = ini_get("upload_tmp_dir");
    if (!$Ab) {
        if (function_exists('sys_get_temp_dir'))
            $Ab = sys_get_temp_dir();
        else {
            $pc = @tempnam("", "");
            if (!$pc)
                return false;
            $Ab = dirname($pc);
            unlink($pc);
        }
    }
    $pc = "$Ab/adminer.key";
    $I  = @file_get_contents($pc);
    if ($I || !$k)
        return $I;
    $zc = @fopen($pc, "w");
    if ($zc) {
        $I = md5(uniqid(mt_rand(), true));
        fwrite($zc, $I);
        fclose($zc);
    }
    return $I;
}
function is_mail($Ob)
{
    $za = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]';
    $Cb = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
    $He = "$za+(\\.$za+)*@($Cb?\\.)+$Cb";
    return preg_match("(^$He(,\\s*$He)*\$)i", $Ob);
}
function is_url($O)
{
    $Cb = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
    return (preg_match("~^(https?)://($Cb?\\.)+$Cb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i", $O, $A) ? strtolower($A[1]) : "");
}
function is_shortable($o)
{
    return ereg('char|text|lob|geometry|point|linestring|polygon', $o["type"]);
}
function slow_query($G)
{
    global $b, $S;
    $m = $b->database();
    if (support("kill") && is_object($j = connect()) && ($m == "" || $j->select_db($m))) {
        $kd = $j->result("SELECT CONNECTION_ID()");
        echo '<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'', js_escape(ME), 'script=kill\', function () {
	}, \'token=', $S, '&kill=', $kd, '\');
}, ', 1000 * $b->queryTimeout(), ');
</script>
';
    } else
        $j = null;
    ob_flush();
    flush();
    $I = @get_key_vals($G, $j);
    if ($j) {
        echo "<script type='text/javascript'>clearTimeout(timeout);</script>\n";
        ob_flush();
        flush();
    }
    return array_keys($I);
}
function lzw_decompress($Ga)
{
    $_b = 256;
    $Ha = 8;
    $Ua = array();
    $nf = 0;
    $of = 0;
    for ($s = 0; $s < strlen($Ga); $s++) {
        $nf = ($nf << 8) + ord($Ga[$s]);
        $of += 8;
        if ($of >= $Ha) {
            $of -= $Ha;
            $Ua[] = $nf >> $of;
            $nf &= (1 << $of) - 1;
            $_b++;
            if ($_b >> $Ha)
                $Ha++;
        }
    }
    $zb = range("\0", "\xFF");
    $I  = "";
    foreach ($Ua as $s => $Ta) {
        $Nb = $zb[$Ta];
        if (!isset($Nb))
            $Nb = $bh . $bh[0];
        $I .= $Nb;
        if ($s)
            $zb[] = $bh . $Nb[0];
        $bh = $Nb;
    }
    return $I;
}
global $b, $i, $Eb, $Lb, $Vb, $n, $Cc, $Hc, $ba, $Yc, $w, $ca, $od, $he, $Ie, $Qf, $S, $xg, $U, $Kg, $ia;
if (!$_SERVER["REQUEST_URI"])
    $_SERVER["REQUEST_URI"] = $_SERVER["ORIG_PATH_INFO"];
if (!strpos($_SERVER["REQUEST_URI"], '?') && $_SERVER["QUERY_STRING"] != "")
    $_SERVER["REQUEST_URI"] .= "?$_SERVER[QUERY_STRING]";
$ba = $_SERVER["HTTPS"] && strcasecmp($_SERVER["HTTPS"], "off");
@ini_set("session.use_trans_sid", false);
if (!defined("SID")) {
    session_name("adminer_sid");
    $Ae = array(
        0,
        preg_replace('~\\?.*~', '', $_SERVER["REQUEST_URI"]),
        "",
        $ba
    );
    if (version_compare(PHP_VERSION, '5.2.0') >= 0)
        $Ae[] = true;
    call_user_func_array('session_set_cookie_params', $Ae);
    session_start();
}
remove_slashes(array(
    &$_GET,
    &$_POST,
    &$_COOKIE
), $qc);
if (function_exists("set_magic_quotes_runtime"))
    set_magic_quotes_runtime(false);
@set_time_limit(0);
@ini_set("zend.ze1_compatibility_mode", false);
@ini_set("precision", 20);
$od = array(
    'en' => 'English',
    'ar' => 'العربية',
    'bn' => 'বাংলা',
    'ca' => 'Català',
    'cs' => 'Čeština',
    'de' => 'Deutsch',
    'es' => 'Español',
    'et' => 'Eesti',
    'fa' => 'فارسی',
    'fr' => 'Français',
    'hu' => 'Magyar',
    'id' => 'Bahasa Indonesia',
    'it' => 'Italiano',
    'ja' => '日本語',
    'ko' => '한국어',
    'lt' => 'Lietuvių',
    'nl' => 'Nederlands',
    'pl' => 'Polski',
    'pt' => 'Português',
    'ro' => 'Limba Română',
    'ru' => 'Русский язык',
    'sk' => 'Slovenčina',
    'sl' => 'Slovenski',
    'sr' => 'Српски',
    'ta' => 'த‌மிழ்',
    'tr' => 'Türkçe',
    'uk' => 'Українська',
    'zh' => '简体中文',
    'zh-tw' => '繁體中文'
);
function get_lang()
{
    global $ca;
    return $ca;
}
function lang($t, $Zd = null)
{
    if (is_string($t)) {
        $Ke = array_search($t, get_translations("en"));
        if ($Ke !== false)
            $t = $Ke;
    }
    global $ca, $xg;
    $wg = ($xg[$t] ? $xg[$t] : $t);
    if (is_array($wg)) {
        $Ke = ($Zd == 1 ? 0 : ($ca == 'cs' || $ca == 'sk' ? ($Zd && $Zd < 5 ? 1 : 2) : ($ca == 'fr' ? (!$Zd ? 0 : 1) : ($ca == 'pl' ? ($Zd % 10 > 1 && $Zd % 10 < 5 && $Zd / 10 % 10 != 1 ? 1 : 2) : ($ca == 'sl' ? ($Zd % 100 == 1 ? 0 : ($Zd % 100 == 2 ? 1 : ($Zd % 100 == 3 || $Zd % 100 == 4 ? 2 : 3))) : ($ca == 'lt' ? ($Zd % 10 == 1 && $Zd % 100 != 11 ? 0 : ($Zd % 10 > 1 && $Zd / 10 % 10 != 1 ? 1 : 2)) : ($ca == 'ru' || $ca == 'sr' || $ca == 'uk' ? ($Zd % 10 == 1 && $Zd % 100 != 11 ? 0 : ($Zd % 10 > 1 && $Zd % 10 < 5 && $Zd / 10 % 10 != 1 ? 1 : 2)) : 1)))))));
        $wg = $wg[$Ke];
    }
    $xa = func_get_args();
    array_shift($xa);
    $wc = str_replace("%d", "%s", $wg);
    if ($wc != $wg)
        $xa[0] = number_format($Zd, 0, ".", lang(8));
    return vsprintf($wc, $xa);
}
function switch_lang()
{
    global $ca, $od;
    echo "<form action='' method='post'>\n<div id='lang'>", lang(9) . ": " . html_select("lang", $od, $ca, "this.form.submit();"), " <input type='submit' value='" . lang(10) . "' class='hidden'>\n", "<input type='hidden' name='token' value='$_SESSION[token]'>\n";
    echo "</div>\n</form>\n";
}
if (isset($_POST["lang"]) && $_SESSION["token"] == $_POST["token"]) {
    cookie("adminer_lang", $_POST["lang"]);
    $_SESSION["lang"]         = $_POST["lang"];
    $_SESSION["translations"] = array();
    redirect(remove_from_uri());
}
$ca = "en";
if (isset($od[$_COOKIE["adminer_lang"]])) {
    cookie("adminer_lang", $_COOKIE["adminer_lang"]);
    $ca = $_COOKIE["adminer_lang"];
} elseif (isset($od[$_SESSION["lang"]]))
    $ca = $_SESSION["lang"];
else {
    $pa = array();
    preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~', str_replace("_", "-", strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])), $Bd, PREG_SET_ORDER);
    foreach ($Bd as $A)
        $pa[$A[1]] = (isset($A[3]) ? $A[3] : 1);
    arsort($pa);
    foreach ($pa as $x => $F) {
        if (isset($od[$x])) {
            $ca = $x;
            break;
        }
        $x = preg_replace('~-.*~', '', $x);
        if (!isset($pa[$x]) && isset($od[$x])) {
            $ca = $x;
            break;
        }
    }
}
$xg =& $_SESSION["translations"];
if ($_SESSION["translations_version"] != 2121441971) {
    $xg                               = array();
    $_SESSION["translations_version"] = 2121441971;
}
function get_translations($nd)
{
    switch ($nd) {
        case "en":
            $h = "A9D�y�@s:�G�(�ff�����	��:�S���a2\"1�..L'�I��m�#�s,�K��OP#I�@%9��i4�o2ύ���,9�%Si��y�F�9�(l�GH�\\�(��q��a3�bG;�B.a�F�&�t�: T��s4�'�\n�P:Y�fS���p��e�,��D0�dF�	�[r)�+v��\n�a9V	�S�޴k̦�n�cj��AE3�F�����3�Sz\n(^{c��?���.D�}t���m�jl{�ȋ��N��o;��G_T&�A6ar�cI��?�,��M��4��h\"�(�:��X�!��<��HKCȦ2�#�#�s�İ�\0�3�#;C9\r��4K`�;�H��DC\"�1�К��\r��������:����� C�ƶ8b��m���+,þ9�.T\0���زN��J��hC*�j���͎�<�b���\"�<\$���>��S���S��;���6\"�T�쮀T�=S�?#�\$�ð�6\r)�)�B3,7�l0\\C�#,�\$��`�*�P���H��3J)D?eE8�8G�\\��✊J�%����8\r(��&����EXU=SUղ���\r5[\$�8̨��:�\n�r\\ոx����C@�:�^���\\�H���+C8^�c��\n��xE�K����5�A�u7�p��|����7����Z�E��y�P�1���K�@��r�9jL*B(	���i��P�)�UI4�%Ib\\�\r��ӪUi�j�?�`ȟ)�j���֞DӲ��B�ލJ�@(	☩5;������yM�l��1����K��J�Q}�	�1;��(,��#h�>��|h�\\K[�p�\$b0��-�\n[�)�0�97�;��%EUV\$4�ں%\r��'�Dʁ3�4��Z|�Q���IR���N.�e��U��+6̨�5-�g�!�M<3�v��g\r=���H���Emܼ@X\"��YIF�7�'Tw¢3��5\0�ޒ�\$*|�4�4����h2�����Ivd��p \n�@\"�@T@\"���Ӥ%���S`Y�i��\$<���a�:L	�Y���ҨtP����\nQ)�L:��8Y�\"!����DJCy�v�Ap�wܸm�%�+��R�Q\r�My#��C�4�=P�I�eI��ǲm\r!�8�`*�'\0�|2Ҹ��`���6I%x� ǑP�pB�_��^3!�3hF{_a��,\"�'�&�\0q���\r�`��03�Fm�����w	�-tM�`H�0fTn\0�C)9��k@�u���|	�a�3�o4�c��'�fsϠ�J&�ڞ�6t���ٛg�� �E�Y�'p�Fc�#��-�	�E����pjp��Ms�|)�l�X����	�tPp��wΌ�\$KR�PH8%h�2*)��S��@����������W�����&��PK��5���s)Y��BDNă=�R�J�(�Y�Zܮ��S\$�\r����]+6+�ԧU�@��^�JT�F��\\��8�u���C1Am	�o�U���jj�x�O�5�z4H��)QJł�&Q�6�Ct/p����\"�-��\$��UX��]-i���l<\0�_\\R\r��\$��Ia����[�io|��^�W\r�U��a�ګe]-�x����[8ovX*tNƉ�&�	�-t���`���/���8W_rck��\\�Bea4�I�����O#�=1�jXy+�,RO��1���C2*a�&|XN�Zr�*<7�8{>l}\rrL�����Y<�\r��F���;��_�M�Έ����e��07ikf�h묖�mU�2���\n�aWi7w8��iO89�s(YN\\S����,�䔑��!`y2���������3�W��������nb�9\nPY�y5M�ڧPa�\n�SHe�8+Q=v�Z�L�߄�oBUŰ%%��y���]�ȯ��\\���.����e]o&I\"%I�\\/���֤Y�����(78d>���ne�@e�Y�Pǐr7�Xʚ��������r����t��|�o�ZJ8��چ�p���8��&Z&�7��!\\���lq�Jex��T�r���9��q&�TFЫP��Ӡ���m?v�@�5�\$�u��ro@�������\0�I��ޣ=m��\\����6��x��Z��!`	}�� ���h/�Sw�׺���-���!���\n��a�9�8�F@\r!�s �D@�o]�T*`Z�]HA��c�@�������>����\"hDC�4X\n&�Qˆ�>g�%�hʰ7x�\"�����ǒ��\\@W�~�p��Σ�ֆ��#�:@�	?6�z�6|�72�=���	r�D\"����������ֿ�vz�CLH�v��ʲ\rL�\$b��s���c<�ڸ+�\0����b��,F�&�����\"�\"v�(�\0MA�pr��\\�H�D jl�2�S���h�����ϧ�O-�S �)����,牺�Z<BL��iJ3	��\r�����\n\"�";
            break;
        case "ar":
            $h = "�C�P���l*�\r�,&\n�A���(J.��0T2]6QM��O�!b�#e�\\ɥ�\$�\\\nl+[\n�d�k4�O��&�ղ���Q)̅7lI���E\$�ʑ��m_7�Td������Q�%F����PEdJ�]�MŖiE�t�T�'템9sBGeHh\\�m(A��L6#%9�Q�JXd:&��hC�aΡR�Pcչ�z����n�<*���̡g\n9��%��h5ut.���QS��\n��Ķp{���l-\n��;�D��\n��n�����g�h��wk0�GPs<�:�e�:�4��T���F��\rp�0���(H�\\�:0��	�k�.DB��Ҝ@ŉ�[(PR��1\"�6hs���eC��30�	��{z��Q��������� 7�J�*�}H,2A+�F��p�Ai#�\"6q�x�\$e�q'EZ:@�I����d}L��4�Ԝ'Ezp[���@%��#�`���6���0���&���jNB���&M�q[@,%ħ*�*?��U,R�m*\$QP����[�N���*�o_��U�_�m_�*�iF,�<ϵ�4�O13�I2d�B5�:�%�cwa2��ȷ|�AU�-���S�Z�W�E�SG-��:\r�P�)�B0@*\r�X�7 ���Sӣ���\"�J��LªLݸθL���K;��d�\"Ԉ-�:�m>�'�n@�����Np�<f��Y��a�.w\$7]9д0�%�[8Nzt%�-�������:��@8lC��7�R��<H�2���x0�F�3��:��t��# �4��(]��~� �9�#x��T��9�(龋��05�A�6��ۇ���^0��(A׎�@�,�n0��\0�:l�(�Lv�:�3�jB���Z��X6�}�C��8?�j&��l�*������j��z䓫e���lb�(�2���/.�Bށ\\)���bG�aMd����j�O\naP��T��C*,U�*���15\$bԂ���`ax!���b�R�~L\$M?�&���Pk(]0����B�H\n�,������7��@�i�Q�\0�T� ���`�\"xnK��6ǈ��r\rᴍ�P��φ�%|�����̵'A�t,\rQ�+k��uf��S=X���D~�d4u[D<���Xd\"����8��:��9�.��P���� \n�'E���aM�)���K3�cA�Bb�Jw�!P�A�5=��4��;Q6���{1LM��'#Rq��V3\0@�U��R�W�D�G��[�q�.gP��v����'0���U+Nt��B���P�*Y�?� E	������9�|�	.�Bz�s�LG�؜�I�<,P�[\r��I��.��#�y���9�p�ϣ@c��V�A-�l]�|��' ���BBɩm7�t���aQ��9��ğbr��0����mQ\"�E���d��En�&I��gj�M�]��h'�n���tL�?\$�:SR�+g�<�Թ��X�)�@V6�/B�Q�k�y���e��Vٸ�°�bF_��m@VDx�Kn3�2-F}Y\"�>�����\0�\\�f58�U�rW��_.2�1�y/0���)Ü��aLK>`T�)qaB��3�S����s,z5%'�6�P����%�eT�Ϻgp�S@+Ap	���^��N�+h@���K�NJ�&	К�[֗Nq�\$�=Ҩ�J�.�VBTb��	qs�_\n5���g7��إ�� ABbV��Hrb�!��Mk���TG��,�\n���?���x�P_��I\"��Qz�]�G��Rb�r'f��R\$�*J�!B�,G\r�7�\0�r\r1mJ:��K���)\0�s��Ra��\n�R��1/�+ P����Fa˄�<�O�[\$`��UR\\�Vc#���R!y˺Z�\r��������y!���rC��`�#<jQ(|t�w]�\\si����B|�ur{�E0>��\$��Z�N60�lW�W�� Ə� Rp&q��ע@�*d[d����ɠc�P��+:L�-�\$�����b�Y����j���8F��:�V�^�����srN!o�-z�֔c�p�#���%��xެMV��f��e�Ѧtn�B�R�왛#t�93,3�y�y��Y��ӄ��:�}��GA]%�+�9�&�C��F�t���K��p��:0�J�]?���2�*!i,.�K��XE��67D�����Пt#���;�m�Y�}�w�3�<��Q�\"b����};d�\\w2���9�}8ק�Sy�PQ��Kƌ_]]w7h�(n���;\\7�g�i̲�����qNE��F]����\n�M��Am���/��u?��ٛ9�dѱ��[�r�VttH��rݦ���uv������\r������O�����c��b�O��C>9�u\0�Ң�F�϶�p�0�iD���I�e-���*����Th���*(FVeaR�\n��D�o�H0O&��cM��j90H���P^U�a0f!p�&�ℱ��L����+��������\$;	D��'\n�%@9C��Po	Z!�h!����¶cso��m�\nʭ��\"q\0AƩ�ł/��+}����bL��	v���\n�2�\\�L:�Σ�^�\\E�&���4�����n)l&����\r�V`�\r �\r`@sH��@�\r��R�zv�v\r �'��nȰR����\0�R��\0��Z\0@a�� ��~�����\ri�,h�1�)Q.�%C����C�g\rE䌹�K�`�bh���FŚN�:�p�)-����G�*�%�t�\"ФH0@����q��!���R1O\"ꆢ\"S�d�e\\W�4-���2@��u\$���I^6��\0�Wn8��%`�RE(���ͱ�a�^\0茀�F�餗&�Z�/��j�����2_)��-z\"���@�L)*�X���ːʾ��3�Ѱ����I�6�t�T�t���\n��2D�J��jn.��2��V%�/D�:�`8V4�E^*��k�U�3�PP@�	\0t	��@�\n`";
            break;
        case "bn":
            $h = "�S)\nt]\0_� 	XD)L��@�4l5���BQp�� 9��\n��\0��,��h�SE�0�b�a%�. �H�\0��.b��2n��D�e*�D��M���,OJÐ��v����х\$:IK��g5U4�L�	Nd!u>�&������a\\�@'Jx��S���4�zZز�S��H�MS���]�O��E2��\\�J1��|�Ц[�i�L��_?�P��\n~b¨�#�m\r/����t7�B�'��C��]��sl����2G��Զ�抍��^TȘs����<\neU>���c��U�>ݣ�����S �L^>�#�²�4\nپjR������h���\r�*������O�~�1��d�#\n��t��t.���b��������jبå;���\n�P��[q ��{ S�J��*�% d+�/QQ���!�N�\n�/�>�&\n|�P0� ��y&֣L���s^�����)�pҼ*�����C,���p\$\$��\$eM ��'#P��.�α��R�Ӛ���#����Mk[���]B?1sL�\n�k8(r۾��.{�_�v\r�����>�PЊvהlk=NJ��;��G4���n�=�z�E��#-�M�,��m��U�7�=�cjL(�}�{#�d#�`���6�\0�0��P�(��k���4B@[�,�~���3+bS[����6�r�hP�e/�1���Yb��u5N����hV.�� E>cLT^�SJ\r|��J�^�	h���5Г!*4W̵�k��)�\0ª;�\r��ʖ=w���Ӗ{� ��V����޳U��޻kg\rà���ɠ)Sj��NS8�:Jz��j�8@!�b���3��܈)�6��%t|/�5���4Ȁp���R�Ck�^����x,�gP}��s9��/���Q�L�=>�%t�u�a�:�-ź�qAo2�w0'v����T٨=\$��<'x�Ik��(��C�t�� øoJ�2���C�e����D!�����:�;�P\\C m\r!�	��4�xe\r�<A ��Ho�`����(t��}������I\r���؄�/ ���0A��h\r��:��C[\r!�\n�0��\"�udj��3\\��Q�/vo�\0P	A�c\n��)e ���E L\0(.@�����q����=L��,*!�e���)3�fU�5�)���+*�`�����3�EOe���v�C~~ǢILQ2�b�H���/U��VF�\\���^)S�G��y\"BxS\n�9ɯ��Y�^��b0d�,̀���t�6J,�I2�Ă�k�6���͓4X�\$ݘ��,����n�.�p!8b\r!�1�0ic\0�;�N���c��4Ÿ5#�(A�6�&�ꀀ��x�C^�Olᨳ���fx��T(���V��Q�H/>�5�oS[\r	z����5s\\\"���ʰ3�՘3��mn|4w�TY�J�H����ɪ�Z&�.#6W�G\n�� u_�ёR2Y�x�%�:�H'��t֬��%�n3u�TK�9Ls)���)�#����;D��i�q/��MKW���v�YV�����\\�uY�9��;�	�UV�����j�g�\n��2������)��:w�2PH\"~�8f�ڈ�����2ٙ2LH�� �I}�d�%�=�=f~�R��\rA7�D@�c��BH~�M�7Ry,���/¸S�I]�)L�#u�m�*����0i�q���}���ǔ��1/w4�Id��&5�*��3QL�H\0��. �+h��AX8�[դ�2�a�����Su�a��8�7�-=�C�U\nYY�l]w\n��{Vf��Gs�h�C���)�F����Å;��l���Y��L�s�B����&�4���R�׶卦�J����@Gf�����3�䥤|�_ن�\rc;Hy?a�:���NTM(@*�Wyꫥm�0�]�����������3[շ�\\v;-@��Mt��i״[\0���3�\n��wif�:�fX��;f�l����;��/�q�9����>�k�Z-��g�!nt0�_��c)3\"`�t�-h���=r��5b�6����/{��%t�k����\\�~3�kn�U��mR���u؀σ�^e�p;����K+���&��Q:ny�^U{P��c&[�^/MH֪n�S���Ҥ�u.����ۓl�'���Cs��C\$dS�U��%��Qr�\0�'\"�7p=Sii��H���&��h�@���� \n��E��*��UW�LC��+��^qG��6�oI�x�A{�ǝ�P����� �-F����M1�����z�&�%�\0�+E�@a�\0�7F���M-cB3F�6 a�LP4��Ř�z�SW3�<�=����D\r�U���]��,�O�f�fggx2ƒ���,P��>�\r��`4K��b��M|P���b�����n���,��N<��0鯌��&��J��j��0X��⫥�J��kP1Kj�nH��(��BLV�-\$#\n���U�^��8}f̱j�BL'��ƾ���&�9�~Zl�(m�P�&(0\\��a�rL.\$�#,��&D�@	��\n��%�/��f����0;�>�Z��^���fu��%:���\r�F�p�P��Jj�T�|�O�Eq*���\rn�pn�PG�JlN�QRЧ ���^�pA*�'��+�0h��A��q�le�M�����%+\\�P����1X���g`�m��BʹXr���h���I�.���>���{�}�l�1������ŭ��M�Q��+���~U�E�,��D�%�\"'����1�\r�W 1Z�,�\"G�.��0�pj䒯�e�Ҡ�\nK+����(-�رjKAT!�|8f���tg'��'�'7'K�#�|��_'��lL�\"f���\".�X�N`&�'����UΒR!�5��#H|M8|���I.\\�ķ0�)�:p�L���Ɛ\"r��x�j�YN`BE�grY2]��1oI�G������;hP3E%j�G�4H.h8�3Q�3�I��-�LyDg�UG!�J=3p�j�rTq�I6�=5��5�7�/7�KSr��aG΀��.\0005��0�J�\r��τ-�FZ��*�C��7p�06��3��USe3kk2�n���+�+��:2D{�K#Q�@E;8�= �6�LY��:�2SWc�*\$\$��=\n/+�/:F��dB��5F����T:#�>4\"t2�R���Tk��>�ʙ��^sb�p*��C�x+̪N�wRB3��4ԑGԖA-\r��BuJ4I(J�*TDtD�z�E9LSIӴ���(p%?t���K�_M҅Mr�2q�~��/T�\"10lGT�O�Ny;2X����>�HQ?�#2���+^���D0�Vt��SB1S��FqUA�JL�R�S����K4WU���%QtU:r��s�9Ӌ9�_,�)�_R��UtG��5=24I%��8R�G�sUC#4�^��UĜ`��	D�l��7GV��\"6�2�CC,��q �ZR�B�Tw�#3�I ��j�^1����/79��TS,�.}1���¾,#�m�\$WU�a^\r�%x�B��-���,�(�gH\r�V`�\r �\r`@�J@���\r��c/�\r��\r � @�b��Tc ��\"\0ĎJ4\n���Z\0@�@�g����c��q�`b�^��&3�[50x�c��ۖ�\"��m�l��O�S2�w��G�Y2:<R�����5�\$&Yp��=!Ln�_e:[5z��CN��FJ�@�\$.��-84�t�*櫣&��� }p��;g�@���ȇ`�u�`��4c/�b�\0g��nq>Yo�p��N�(�^�IKmoxpx�����e0��KL!�cx��U�z��BC�o)_\rU'\"ԉR��)���\0ʌϢ�v��Vj\0覠�HD�W�qK++�4X�^mI\"����,%��\"�А�-V��b���D=9���S�&K*>8 nx\$6��MC�6,\"z#�<p�.X`�h�tq�u0,����}o��x��y	\rL�^�~ՋR��)-'���>4k������j8e\rb�M	�^s�}��8M!M�Q̙�{�	\0�@�	�t\n`�";
            break;
        case "ca":
            $h = "E9�j���e3�NC�P�\\33A�D�i��s9�LF�(��d5M�C	�@e6Ɠ���r����d�`g�I�hp��L�9��Q*�K��5L� ��S,�W-��\r��<�e4�&&#��o9L�q��\n'W\r��hc0�C���1D̆�|�U:M��фS�`���X :�qgLnb� �� �S���n����R�I����CM~�1*N-t�'�d����r���� ��h�c�q�?\$�lႋS�8�eN��q3_9���l1N^v��8��\0�´��z��7,p��#�zp�=\"H�4�cJh� �2a�l|\$4�9'�sN:B����J+�􉨻�7��:�c��E,V�E����ƃ|mA���8��N�(I\"��2��H���\0�<��HK*��3��DQ\"����#;�3�0l(�%���.؃��zR6\r�x�	㒍1�OA�a�V��KT��R�����( �p�+2ϋ�����7P�\nb�����(G��qP#z�D�Tj4��xN�Σ+!�	�D��v�YJ+|�V�=o�\"���#�\\�����R����mT=�V+<�+c��0��u���̀:�Lt���H��B��5��\0�)�B3�7�2�93�\$�8̴\r��Ҙ�u��C7(��]	����6C����tT ��x�����&)�#�C+��8\r#��ˎ�F+����[]yS�A��r\n�a���O�L���;��I�jx�x�\r@��C@�:�^���\\����`��{O�4�;R7�<9��/�c�5�A�(�XP�x�!�X��N�������҃�C�R��E4⮮z�״*a�gh(�\$\n0�p9�8@*!K@ڢ�]@��a>��OId��8�:tP'����\"�hAnD��9�ujw�x�* Р�ң	���|B��2_X��1\\-��̒4���A�]��r��VBZ2nf����ޑ��2�����Z�B�)ph���rIT��R��0r0�D9b^LP�@��0�n_�{�rD:�ң_�^e9z���J*�D�Y[C�~�Q\"]���5��O1�Y�j(b0E�PV8j|�\$�x��/BpL���>ChbE��»\$2S���*'鑮�R�Clv�o��C�a[	k-�I����,G,�7,�:�	�k,<��j]]�z_d�2�*AX�FCǦDI�%xNT(@�*��A\"���0��B�6Pژˋ�(�92�x�q�7g��T�N\0pL�L7@G�G�Ʌ f%?Ƥ���Y(��(�i���A��5�r��C����p��\"FZ����2Od�i�RUx�I�3�p�����P���@H�E��HzB1�9H�E�Edc���k�3*J��cS(����>��M��2 ���ab��!�X����1�Mn����`\n\nFd���\r��9q]bU���	����w�2�Q�_�9-�	W6�U���B��sM\$QI�⚖�����쎆�@�C�.'�W2�`�%�d��ت�B㺱Լ:5æ^�D+'�f���HL����&�2�a���\$vJ���䗬��x�nܾrbI\"9����d	�%ɜ�i[���ˈ�(��4��qqѓF���+RL��|2TVE�tSi'���%�9�{ύ����zJH<5� �;�PĒ���5�b����0ő���PԢK-:�7��Џ�F��\$:؂�ъv1�2=���ɡl�\$���H\nL��4F\$b�\r��d��*�WII��/e�#F���\n�d8���f���J�g9����E�rc\n*�ɦ!��Y\$8��	��H�w�����Ί{;E��M3t�49�\"X�~��ԝ��*�	.���Fe�\"�S|�����:B^I(����Q�pn��'��v�L�>\n�nR�2��\"&e͔.D҇����ڄ�����b��W;\\@LX�\"��k��OY\r�����՟^/M�rs�j'��_��A����ƻ�f�s��-���Ul��a�{Up����h%e��2�orӒvF�1;��Y��6.��{O<n,F]鼱r[��q-�2��9��=l�l�)Ĳ�1�L�\\�Aj`��![*�8�E�g�bfٗ�\\��U*�.\$�.����h��mļӵT�:I^16�!�UE�����9#����V�U<�Ƕz:�[�\\����'t�[#�D\n˷!-�4?���du�p�a����J�|m.����P>�g�?��枥��{,ಘw1��-H��[]�m����>��Vm��<����3;5we��m�Oyt��X�?|:6�����q_	�H8q�#T]?a�Ї��u��O�?���x���E�C/��_�|^��[U�_b�P⍂䢎�\$��z�=/�~p�mt�j���z�\r��p ���-j��O02��Vp;&����J\n��ҫ�����j�c��d>�m�`�& �?��j����dD�O&��FgR���b�5��N�,Y\n���L�*�l�â�R��d��\\u���M;��Ī�& �wE�c�\r�V���Ŏ]�ީ�b�`���L�&�\$u �#�ؗ`��Z\n�\\��N腪�	��.\r��[��16�&�r�.#%@B\$�gn�ͩ,1̰Jg�/��1�lZ���n�0h%�\$��X\"���M/�\$��h�d��*񞃫T�1ƒ���_��9���:ƧtHm�\n˴2����-�<\\����/��.������D7� �~#�`��1\"lG���j�=�Dp}���̣��d%�h�H\0���Q�4RC|�MHՂ\0l\"�O��!E\\�h�\"�3c�2�h�%�&�@ʚ��TB��Vq���b���M��R�(q�?L!d,�O�\r#�	�? ������	\0�@�	�t\n`�";
            break;
        case "cs":
            $h = "O8�'c!�~\n��fa�N2�\r�C2i6�Q��h90�'Hi��b7����i��i6ȍ���A;͆Y��@v2�\r&�y�Hs�JGQ�8%9��e:L�:e2���Zt�\"=&��Q����ئ��*�EjT����k<��\0�Q��y5��Ǔ�\n(��Sl�L�_MGH�:�L=(����kT*uS���i��AE\\���a�f���y8ALDd��l0����4� b#L0�*`�tb&�F3((�i�����QNj�R���Sy��r4�JfS�xۺ)�h�Sot�r��z�~�\$����6�����4\r��4��0j�\"�bDb�)�����`\"��-\r�*�!���5�����\r�����b%�\$iGb溮��\$Lr2�\rn\$*3V��p�2�Ɂ!,�-2c̻/�c���7#�p��B�9�8�80q�J\rc ʢ(C��#\$�9�1��7: P��J�#j����3��K8�4\"a�.K��;�����ɬ�=C{(;U�k�\r�k(F��7��,P�CL_Xm>�8,��J=�T���iڱ\$\n1@�R\0��#�_�bHډL8�<]8�2CE��ւ.�\r��MRȃ\\�a[�#�9��4�\0P�!苀:&���7�i�@!�b��x�'l�@3%#j�\r�!���]�xÐ�l��.���uZP���\0��xܛ�VB�dÚk,�e�H�'P�S��z���9��U�ˁdTF�ŕ�nV;e�h������,�菱e�(�\nb��A��PD�'��;��x�(��C@�:�^���]B����%#8^1�az��\rڰ^T��������M�}smc+�7F,���}�9蚘�k������4��)�V���;=C��3�a��I���[j2��̢C%ѹb4�@(	�A��%j-�B��b��1G%�-R^L^��j툘����5c�i��8�Se4!̕��2MJ'���T[E�	��bȖW%�\n�28��)�l3�Ό�	�{�:#\\�����45TII9V\r����8G�\"��7�6����8��v�&�F��Q���� ���'��aƒVp�K/��2�@�n/)�,�X2�W+܎����\$A�=��ƳC��:Oh���5��i�`�\r���ߋ�F�����bS0C�5�)%xOK�;%exb�\"Ĉ퀠�����]��0���Xlp\\��@г�ng�����Hzia���YII�'�P�X<YR�Q����Y�;KXN@��>�>�9��d\\����8JM&�\"t��A�Ѝ�8���i�}��p�M�\n	g��FQ,�%[A��҄�I2�#�#A�^�h�ߥ�e�HTh��4ȡ�L����UO���+Ā��aةf�-C�PC��dK�J��s���c��xr��}��}Zk1�A�H�����i�i�l8\0���bш1GP�֠@q�2mSf�2&�����+>E���\r�A:�4C��C\"�/�/>H>��c�ż�Z���ʵU�13h@�]��r�@\n� M\nX��L6���q~��؟��N�m�{\r�.ߣ��p��/7�\\�imD���J��{'��#V����6_2����8S71 �Wk�%���x���֕_Ǘw����7=�Z�\n+Uyg�w���;r��#������v�W��a╄�s��d�7���r��:AJ���N�Hł�Q)�	U#Q�?)�a�JG�\0w��a�B7�Sԣ\"�LJO������3����UJ���+D:�X�I�H�9�1'J�5{zq�1B��\$N��3�M*���y�¶iJ�B2 �W8ih�Fb�D��CT��*��s�,8�H5�#���Δ.u�����u������9��f:�������]3Q��*�]�K���Bض~ɯmJ�R�_�l�Ͻ�2@Su�M�F�\$j�B������cEm�ڴ=�0H\"t��T�����Խ2�А�*�Yȕ8Tw�cEJ�;�4�+\"�ewݡ�fH����C�5;��G���`Z��I[��ד�l��l���+c-y��6)��bٟ����p�������n��巫2t�R}��=t�������\\Uvd���(���.�Nz��7O�����%��V�.�ճ�k�]r�u��%/}Y�D�rS�t��G�pN/	Yo����x35�<G%��Q�`�����ۧ����uFTid�[\"�9Q*HbF�85�<�=�b�ΐ�	X}Li�98���\0n�z����ؒa�I�ej��+㼿��fgݯCB�]Wu���J�O��_�^O9'���������	[��\":\r�\0*�עom�,%o������\n���O4�m�X�\$����2JM���+\0��㒋D��F����\"�|��zS�h{�6����8?�����o��n����(:����\\�FF�MX�0&lpvH�2E�M�Y	�dH�\0��B�C�\rb�3�8�P���x��Ί��0��o&���\r8�0���������p�i�7��x�K~HJ\n����&���/�J�CJ����\"�'P�谋	j����J�x9k��2#�(1)q,5�`�(O��]�n�\r*n#^,pu�h����J��\0�Z�,��胀�F��ޒ��q�#Q�Q��_.�	0�V	b2����Fb��\n��JѠݠ�P+���������������G��Q�5��k��/��E��i�(e�dL�\"O (��F�|e>:�E`�4l��Bl[��g#hkB���\n���Z��H�%/���\r\"N\0\\�x�����޸��(h�&R���\" }\"*\"�*lF�MO�H�� L�0@�.k:�B8���6�(p-�VL1�\"w�&�r�J�N��8��\$7�z��B�%�I%�R��GꎀTh��r�O��i��Lp��,K�ߪ���`�M�&�s/ eB�j�	�3�/40�W�P_�0��`�`�(�-5�^Go�7D��\$F�&r�B�\$PTa4�bFQ�@(B�\0��9b�\0�\n�th�X(�9�XL��#˧6�d dZ��<FC6E��<l�J�@\\�m3jpX\"4\rC�|i `J]>�bD�G4����A�0E�����R";
            break;
        case "de":
            $h = "S4����@s4��S��~\n��fh8(�o�&C)�@v7ǈ���� 3M�9��0�M��Q4�x4�L&�24u1ID9)��ra��g81��t	Nd)�M=�S�0ʁ�h:M\r�X`(�r�@g`�\\��*LFSe�f\n�g��e��S���n3�M'J�: �Cjس��R\\��C�v�\$��k'J�ʡ/4Hf�,�-��:ZS+�2���m�\"Ԙ鹓_�Ƴ.3pB��ԇ Q;�z;�\r`�9��m��0�t��\n��F\\�O2�oPõ�Y���4���L�4S�퉃x΀�O���4첾�<�H@0�����7�8�:C��:�k�Ψ��������B\0R⹮�4Vȼ��(p�@P�\n��x4M��BE����b�2`A'\$��\0�\"d�� P����JB�*8�3���\r�P+c��C\$�.O�J�03<�70�D\\��dV����/��\0�,h8��/B���1��<�L�J�5C=��Z)���TRI1���h%R0�o[��>5��2�I(\$���ҷ(�a?���\r��]�z�ְ�Y�R�p6C�P�)�B5�7���3�V�JlZ�2+a\0��\r��5:�)�W���ܩ��f�=�3\r�d����s��l�����;6�:݆�t�9���p�%��R7��܃B�&7`��*�KH��`�#�h�7a�t�Lk�l�!���?�D8\r2(�v�A\"�0z,���xﱅ��ڀ��s�3����<<�BB�Tp�9%���/�HӖ�\0౼p��|��/\0�Ԡc��'N`@ń���#�\n��(��hf � *zv66����G:J9)�,\n@��]'gӄB���|�9\re���)�p�'��(�����ݧ���G,T^.}��9ɝ��q��Ф�k��'�b� �j�0@���]�]�ՈG�)�^!���pN�o�\$��Vp \n�q��`CBY!6A���T��o��I�g��eA��)bPT�j�*^@���*`3#�ƃ�\n3�[�@�ٲ�Z�,ǹ�R���鈨M\n�qH�N�� �Ik|gJ[�>\0(+7pҤ\r�\$�V2��G��:q����r����t�!�#�|^��\r��9%�	�N�y����y֒1<��D��Y:Z�e��z��Hg&��מ�h�(m��C�(d��ǜ'��@B�D!P\"�il(L��4��GCpa<Veb8�O�}qѹP9�	��G�C��˕.v26��Nɦ Ĥ��5ACk�Q�P\$�E�	��453TGp�J��Ή�B.���b��|�ׄ`W�4�V�Y��/��ܕ�`��Ĩ>2���2�OD���PB��iԥ���zUK\r�\"y�3;0@yX\nX��E�\"Z��V^nl����gX*�L,3Ԓ���ʚJf�G�ol8aMKՕI��JG��T�@�a�5��1V�p��-�	:2�֎��<!�32p\\k9}��V�\$*�_��:�Fv�!�	a�q��92AN�aw��]L�����Jf+�R���i�:R�jaM�bCC\n93��Xԇl	'�+��q�\\\$F����HK�U9�����ƈ�sɘ���\"Uu�z�<�\0�B��L�(�����^+�R��<�)�(�K%R(Ƌ�EG[C��.�\$�E\0ap����R����zz�\npy�#y'��&_K�ĹG90�	Bq�9�7���PqISݡ\n@��8.mܹ�T5�H\\0�7\"|���	P_y,n\$����A�eKpVU�yI�R�瑱p�l�.�3q>�Z9����\$u&�����#�,�b�Vg���;���U�8�,*�\"稁���8Pَ�f¬%��fL��{r�P�dv)��4{6�T�7e幨���I9�-#����¹�����R�&��X�U�V����[UhvJ��'�3��9;Gk-��*6E���e�)�6of�Й�-u���OW��d�6ׇ�d��)U+)1t'�M%�SI	^�'��J}�%u'_G�/��G�|��Ht�+���Z�ؑ�pH\0g,h>�`�eX�e<Q\n��C`�.��c%��4Hx+�:p��A�,O#����%�X�4\\�����Ix���Ks6R�^�6��1\"����d��gP�����6�Z!�	%T��I�a�K9�E�qf����v�ͩ�GuŘ*I�N�{<j?�P�\0��|,��'\r�;���e�<�&/�����N�w�y�+T{���G��[漱\r�d�%󗟳 �Fj� �Ba�49ҕO�qF�[�Mu�//��~�����|�\r�+�z�b�����\\�i�>gx���w|�K鯘���}]�owʿ��c:gL�J�}P�SH�*�)��5�:�-����k�\0�p�Bh	�!`�@�0�Ъb~��!��9�pJOP)l�����b pJ��[T-��h� �\0ܵ�v\r��gO%b#L\r#�'�Բ�dd8\r�V\rgX�d�7�ǈ��H����` ��x��r�<\n���Z\r�c� )E����p�ߪ�\rm��\\�mj1��4����{���P��^&@�ev���<�3�\0���0À���%Ъ���GJB�v�ƅ�PD\n� �?ɜ~��%ɔvj��*F� �i�,h(?��1�PC�RbJ/��b<�CP\r�5qd1�ib<\r`�j���=�\"���|�\"�V,6�\"�#Ѣ4�Ϊ���� @@섬\nd�!p��q�<�����Tb�����1���\0�CJ�f!K���'cޑi���Ą�EviCĪK���\0�҆~��\rh����<��J��3J���G��k��7+�=�Z��:1�b\"��@�	�t\n`�";
            break;
        case "es":
            $h = "E9�j��g:����P�\\33AAD�x��s\r�3I��eM�����rI�f�I��.&�\rc6��(��A*�K�с)̅0 ��rة�*e��L�q��ga����y��g�M�:}D�e7\$��	�` L��|�U9��E\n��a�J�a��aO��lX�g7G\r�踂�H�Pb��E@�R�\r1����V4�\"�H��\ns:��:ɴ�\n9���Y^ � 4WL ��}��5�x(�e2��[���ra�xd���rM7�/���A�2|[��������.i'��M�d/6'��#`P�7�s�؎OJP1���X�b�>؍�H���`��>\0S����B.뎣脸o�ӌp�ހ�#|V4�#�A�Q,O\"q����\"�M��P�d4ŋ�J2�2|�)��T@��0ƺ2�Ȃ3�H8�/�r��7.r��Y��Tؐ ����|9�kB�,�D4��&�D����h�1�Ӄt:��r֏��l�&�b*)�\"`6�oĒ�)�Tg���@��&�C�j2���\"���W�C���Z��=���\0�)�\$B(�P��7����;1�������^�˴� ����#xִ�)��; p�T�l6[�J-{�0�؍�5������J>����5,�v��)��2�W�G\r�4©3Ҍ1���L8�.4��J�8\r0s�#+�����\"/:��;<�\0�%닎:I�L[4-*��P�X�<���@ඎc��(fy��~�@�2���D4����x﹅�0ګ6�r�3��F�ǭ`^-I8��mB��7\ra}f��m\r��x�2��l:82��&�zB:#-�;@&��0��!�\"j�ÿ�[�p3*(	�\n7ڎ3(�J�� ���*���0�+�'I��E�r08t�#��*���-���gk��:�k?2�\nx�*a)3��#�2+2z)��s� uH�ָRhM��}o���ؑ1-z�dɚr���i2�(,��2�L+�\r��20�\0L/̐�������gWF_�Pm ��������CR_,T�*�*�X@eB��òv\\GԂ`Cڞ��J�e0�m����_�;��ڇ�C�\n�ɑ�r@1�\n�܎32��?�T�Tn��0N�޹����T�࢜���Ҭ8���A�cKjщg-h�e�p��^�M}4�Tg��i\\�t�\0��̫\r;��I�%d	�8P�T�*]�\0�B`E�E�6�\$��e��9Rf��	9sd(��3��ʺ��D'���b�cL��\$r�@�bQ��Ţ2�I�Y���ܩ�\0}\0Rc\\���4BPI���IT��PԐ�هI(I�d[\$�l�G,&Բ��j�^�xܧr�Z\0S %X��i@Y�gC�X�@�1+��Ç\$�LP��+��h��*H�rt�l2�����j�� ���P\"�D6�B\"�8���l�(r!H����`��V�i	*�\n�g铭��2�PƑ�8�DV@��o#�.)�����`����!��a�4�u\$U����MQ\$�9#\$�`��5L\r�|�+c]_m+���5\0T�;�V��_c�1�A�����`�*�3*��T�.]��%��9�<�#�~��A���M�kKJ�ߘ�E�Q]K4��`�{�RI)%,�^��|	@wc�\"[Q|��\n	t����s��E.i �#\$�,)�Pq5�����N�R9t����u��\r\$�ւ�Z  )�ܖ��F�uX�9�>�^q0�! rN���>�Yl�Nn;���|xf�E�%��蕄���aU�.[ʻ=2��c�3&t`��yQ��6	+N�Mk7�y�����.�8gvc���M�8ʪL��\r�v�gA��3F�\0(`�D��Йa��/�)�=3\"�L�:j������鼹Hr��j�V��'���ӭ&P�ê�ܝX:�&��y�ՌR���X\$+�\n%6b�غ���%�6\n���e���8���'i��ޞ��?��i����܎s�U��e�n?�I�I�Om3��:Zost}R���84;���G�ׁ����w���*�\r�h������&�v���*�>DV�v�U�<�N���QJ��z/A���2��L�j���`�ڷ�0�U�\$W{�sH��_�z�v�\\J�h7EY��k���:�b33��^��g:j��-��{�X�m߫�>��;�s����������*�X5��;>�C�/y?5��\r5nn��j�'��\\�h���ʘ/~�[�#o%���H�áa�[��y( ޿��41������?]�M�I����k�����;���\n�m�ǿi?f����� �����4�J?]D4J��vc�Y������~�>o����-��9Ď,)&�c��� �d�J���K��\"�>�(�C�ĕ�&I��-#�\$��cc ���;\"·M��%��%W+��-È:��jhi�~�h�P/��Ǎ� �`�`�Xtt�:^�z\n���p`d.b�����\"Dx0^�m�#��\rĔ�#b:S��`ź��ˤ�9�pM#r\n��B����Ш�j��EcWd*B�P`�R&fF#g� d\n8b�]bxPÌvQ(JH���8h��B�\">��j#��g�D�V=@�&\\��6�&v�`�mh(f���h�H����ulRc��x�n��lq|1�~��2C�Ml`l̓#�<D���h��Q��E\$.Љ:kd�1b:�,�\n0�\n/I��,�\"�#�`�J&�����1���j�Q�I#����x���8`�8�?���l	\0t	��@�\n`";
            break;
        case "et":
            $h = "K0���a�� 5�M�C)�~\n��fa�F0�M��\ry9�&!��\n2�IIن��cf�p(�a5��3#t����ΧS��%9�����p���N�S\$��4AF��\n��EC	�O����T,̰ی�t0��#��v�GW����2e�ю�S��K�\rGS�@e��q�:�k\0�^\rF��<b4�D㩴�]���43�\rHe;d�Ƹl��e3���H(�`0��Eiy�� ON�z�R\n#�M�ۙһy&f��R/���ɍ��pS2�����ã7I�W�����:F�	�z���C��	M���a����ZF��/2�նʓ,ƨ�Z��+Bj�22òF�0�@�\$����*���#h��:�J�<#�v4�CT%ã�<�D��J����'�����H��'O[��<*�!��tEC@�¥h+ޮ1o��5�#D2�&C��4ȋȨ�iP�5�j3�3�0�:��`A�����∘�\r��78#t:���\n�9\"������~����i�2�=_�q�I =q�C�P�����6�F*�TmP�6�c�J�ͣi��:\\R\r�x7�\n����R�6\0B�#c�7�kH:��)�bT�/�[��Q\0�\r���<i��n4cd�'��j7'�j�����7��P�0�H:Yy-l��c8���V.��_C�����\n��#��42��+*5���13 Ռ4�&���}�N��ˏ����\0x�\r��L �8Ax^;�rI1�Ar�3��F�<1ct�7�����/�I�5�A��8 ���:�x�\nD%5�z��I�R�cÕ���ꠧ��0���S���j�6�*���^N\n@��t�V�)Jj��7�x����H��-�<��n�����+t�ǯBx�*�4֔�L\"�#cL�騞~gm�H_��CMN��>����c@��^8�MB�o^�L�W�\"�J�x5,1%��`��Ր \$�D¹��X*\n>GĚ�B��W�FVjԚ�%h�ߓ, ���V,�J�\n&Dq�+U���=@e���F4jII�;�%�B�h�PS/̋8�RʁӍk�:gB�]�m=n�6E��{�I)a�|��b,X;�,f�5.B�Y��	f(��������&%Mb�5��#Jt!m8\"p��XQ/9��Z�C�A�@f+�<3��xN�W�Բ�@��\0U\n �@��8 �&Y\\r���G��&w�从f�^��0V�j��vк\n]ϡ��셔�'O�R)����PK;n)���e�R�� '��L %d�v��0�C�M�c�\$P��\"~���+ÂdY�5J�\rP�yj� 1��4���HO�Z�2^�����f	��@r:�cmI�T\nA\$#�p�����荷������akv�v��!���2<y�i��X\"��μ.L\n�q�췩\n�������:N �v�ؓa}�^d�k����3�H�|�*�P��Cj)+�t��i�����rS ��{\r,m����#��c\r�%��v\$O@�؁)e��<����j)c�\\��O4��)#\$��K`�τ#uI�ΑWP�#qq�J��\0���C��/A�;*�0�,q0!&���Q\\X��&���;�\\Ù�H��C+��'�*�@蝏� \rˀ8ԔATB�\\�VWe �`�*��{�k��'D\$P���\n�	��f����d��<k��0��lM|���C<Y�ʢk�8�c[�4�s��h�f�1�\r�'�D#��a�?��3��/�TeG)�,�~�c��4P�fp3�dE�>vn��vf8dpґ�AO�p\rJd3��d.V���b��f�j�w�B�#\\|s��;E =	���-�\n+�x��oE���&-za�]��Z?��}�ᮇ��]4��#;֋XM0ډ��~�u%�:R����,)��:WZ�]\r{��F��S�G���7v�ͫ��܅R_^�]�v���P��Vi��pL��,��ta��*�y�@��fӓ\$4d\ry2D���u���}op�C��!�881��@�)��Ԉ9;2���S�	>`]����!2�g��r�V�J�L4�@[����\n�Ptz1;�s��w2�?@F�wb����Y)E�/�����w�\\�ȫ��>�{�z��[Cm�u�u�\n�m�0g�k�p����wC�hT}���H�E{�N��J��n���W��Ґ	���H� �?�U��1���~�Ӵ�P��wv���v	5�U*��ٳ7~�w�6%�����*�~�����*�9��͌r�%i��*c�He�����9Xw^�M~����7�Z���;tߥ�¡��[x{4k�&#R��0�R�Fx���ź����^�L�ln�L`�V��`��d�+��\0�l�\0�D�\0P�Jh��p�À���B,4��o���]CD2��g���w��PX�@�����t P	M@ȧ/v��(U����ح�vcM��D�w��B6t/���t��	k`�\0�� �. ޙ\n���&͞�b�b��n`㉾|0��^��\r�V\rbfg#z!���L.1��r��\n���Z.\r��rJ�&��\"�#�����d`Hv��^ԫ�PΊ�ô���n���2ABr����n��&���Ա�>8\$�&\"zW�H��t ��h@@���C�����p��\nCR�h�0|�J\r���\nq��L�c\n|���lP#q�ͫ\r�*NM��gC���@��\$\0@�R,� `�<bNF��1��θ1cTL��h	��ej�Gp�y����ψl̪#� �\"�25��\nQ�҂d�Jv+@��L3���G?�\"/Iz�O�0q�����l)���b�&h��Gﲓ(�c�#FN��<�C(�7��	\0�@�	�t\n`�";
            break;
        case "fa":
            $h = "�B����6P텛aT�F6��(J.��0Se�SěaQ\n��\$6�Ma+X�QP��d�BBP�(d:x��2�[\"S�Pm�\\�KICR)CfkIEN#�y�岈l++�)�Ic6�d\$B�!Z�-��~䌄�,V}�'!�����l���UUiZ�B@��qA���S�p��2�Q�B����B�#�S���T�Q:�HT�k���N!([��+����{�r ��0�J�@�`4��̖��Zl�I���㯕��ϸ����Z����m��aRO���}dv>f��B�*[\0�H�� 	A��\$��Ϋ	jl�9�T���U5�_\n���v�4ŢJ��+\\8�-*9`�6\"\"Z#�CL��q�JV.�B�lM3\0.�{h�Ǒ�k�*,2%2j\"U!,��G(t4�-p��Ŭ�/�(!r�ǎ�D#�Yb�ǅ::����^�(<D��τ�l(�%!-(|� ,[�/�V�è�6��1\r�*61�#s��A��g\0��CTB-)RB�)s�����c�ϼp�D�� �BJL(����l��,N��I���N-�P��i��*ut�U�`4.�Ut|j�/���E˰Bf�5u���VZ#f��,��h��k�+��Ʊ���h��<��C��6Oo��%I#���-U?p�\\�/I���5��p@!�b��T�0L|@���T�˭AX���s�}�����N\"f��K+���*��u��r���L\n����s9l0�K�Z�'���,x�f�ܙ�j�%nt�D�Z�u�8v��Bh�9��(���;�㔠2���9�&*!\0����D4����x�υ��6�#v�p�8_��c��7cH�7�*0�C8�:r��1N�a|\$���26䣠x�!�9�@�4\r��7�#H\r#��\r��#���4.�ZZ���3�!Nm!�H��OkX��h;L�AC\$�帋JA�)���,֊U�ɑ4)HݗEVf�;mgI���ͱ�2�%_\r�L�R:�L�n ��RQ,�Ȗ�&(Q�[`yvBXNhI��\\�g�IQ�:������L{	��&��C���� Y\r��)�L^0ot@�Ȇ ��\0S\n!0`ҦA\0v\r.D#@�rP\r/½�C�o\r�m�gN�V��W���&g؃�J��d�	�HT��]Ͱ�0t<����RQ����(䒔k|3��!	�H1��Qs@���VG�91l���5d5X��l�9>,l������x(k����R����L\$dM4���OI�[�cr �B=A�K�e��S�F���O��&dޡ���\0Q�Q�T�3R�+����s����\0U\n �@�C��D�0\"�f@:`OG��/�DA��'e�3�%bQQ�@d��h���34C�i �?%�ѧ2�ld�/�0�8d�j�t����1t��D�(�L�r`�L�Mxx�(�OS�@�#b���/T��Ò{��X����A[��s5d�3�3Yk�\"�\rq>2@�f�\$��g�^i������-#�����dB���Z��a-6�~�:�v�,�>���C�WQ\r8����O�[9d��T��S�ƕ�<�J�\\�ϤX��1hd�\$��M\n� F�\\�ul�Wk�\$G��6\"���2��k�p\nUȷ׆I�X`�/0Dɕ��K	q0�#b]]sӪ�!85\$`H��k�n\"٣�v�4�p��Ar{SNa���d�>Cp�f��\\��8�/��� ��;�����k\n�C��b�R� ��� \$,t�KE5�����P!8'б�c��h��\\\r�C\0���r\r1�L�����`����P�r��S7iX#v�V!UT�4��x��3-9���\\Xjz��bt�*���;9Ы���Tu��Z�)�0���M�kIZ��heP˦U�%E���H�	�e��'�s\\[�?5�ҟ�n��p�3ƈ��ĳ	�T�AzN�W}t,��\"!\0���SG����2�C�1{�ܨ[2�j�����{SW{oj[T}�>��[�_J�B^q�U��RJm���\n�Y3��	��>�޻�}-X�4u9��Ԥe�j&�^��\"��Y5tn\n�Q\$�ɠ�*�DE<T�3�1�x���B�/�\$��FF�g�\n��o�1a��\"�^�[�W1ؐX�譪A	Q�F�����w&�K��rY�X��5H�`Z�ͨ/�b3H���;��a���XjBg�=Ѽ�u\">����v��t�nY0}t������5|'�������4���k�/���\"��ZJ�E&,�T��0TzD,(�Ll������5��m�=�f�z?�{�sl��S�|)h�ė\\�`�I�X�o1�~*c��W?��Xj%\"(?ZW�4������s�K_yO������G~���;����!c?�ޯ���j/l掌�+*�������O�诅o����m�7�j#6*��c�@Ôb0\n����G�l�c���\\_pN,�Hk�m�N�,t�E�`*�g��a�l)tT�����ij+'ҥ���\r���\$�)��\r�0���иz�\$\0�84�r�bJ�D�����m`�@�`�\r��`�f��� ��4�\0�z����{��|����4\r��o�@E4t�\"\n���pJq\r��|����Rm,��P��D�*~���kC�:ь�1D��Jд\"T n��h..�2�z����s���J숂>X\$�B|*�Xc�R�%\0`/>��	���J��'�R�����Ee��`�F\"6�g.��1ֹʤ��j۱���䗃��ɜ���m�^P�����-\0��@�z�ʱ d��\0�`�G�R�K����㾵d�5��~�Q�B��\nPʪ�\n^��\"S�HB��P,�&2�d8�xU\n�7\"vcF�.k���/RX��,dV%�]Ķ����+\0aR�*ݭ�H�.`�ꪅP=1��ڬoʲ�`�N���O� ~��(B�c�>";
            break;
        case "fr":
            $h = "�E�1i��u9�fS���i7�(�ff�D�i��s9�LF�(��'4�M��`�H 3Lf�L0\\\n&D�I�^m0�%&y�0�M!���M%��Srd�c3����@�r���23,��i��f�<B�\n �LgSt�d��'q��eN��I�\n+N��!�@u��0��`��%�S#t�ߝTj�jMf�B9���C����0#��N7�LG((����iƌV�C4Xj�h�n4�#E&�a:���]�V�5�a`Q���R�Tp8aۋ���xPQ4�N�\0��3�>7:���:8�s��cK>�2L�A���(��#2��+I\"2@p*5��tԎK��ڰ��4�)k.���7�q�B�.�#n���`@ꍎ��B(��hmF��(2xƁ�HK,KR��\"���#3��ή8����\nS,@���rP�%�Ɇ\\�B��+���¶R`���(pϯ�*L:�c+7MPx�:���Ɨ�c�:���a�H@)�\"b�:��l2����0�|�'C\0���)R��M5@��C�7�j���J�\nv��`\r��~�ăt	a�B���%@�ޣ��X�I�T��J-5�p-���t��.��_0��o���d�L2I3\r��7�u�@!�b�����\$���ߌu�Z ��(�%cm8�����7�3�,C��p�5=�\n��\$X曽�-K�\nG�C �K�V��Za�̈�eЎ�*�L-(\r<\n�����?����C�2���x�\r\r���C@�:�^��(\\0��j �%c8_Zq��;5��<9\\��/�k���JI%���^0��\n�A�v7�\n\"���p�ꩼ��3Ȋ��V� ���O�hA\0�\$\n��8]�0@*!M�����\r�H��M�yب)H�6�	���JL�i�����t:��\"Z�7��xS\n��\0@���c�PT�Ca�r�S�ৢ7�BH8 ;媳�x�\n\"�?%D����&%�9'%��70eQ�{��@�1�V�JA/,��#G�J�|)�4��a��=&�����.��h,�ࣰ����3�8�W��mD�\$&Vķ�T<[h\n0��Lz���\n�R�HHp,,��T�<�9�Fl�������#��N���yZ:� �RU��H� �@��,�*)�0�hZr���	(l95�]\"��KQ��\"Ra֫ZK*`���Q\"�]x���59#	�CI'Y#���_9�:@(��l�C,�	�8P�T�*q�\0�B`E�I\r��P��p��M�B��*\n��5��G���}xp���; ��\nЄ����HfjgܺFX�Qmd�A%��D��d���{	�)�2����[K�q%`	5Scl��TxA|/\"6�0xGh�cr!RV���\0!��b���4��#e�-�1ޅ��mP%�<�.q���Z:�bN��\$��J�xS��4;sf�)�#CD�c�]]!��!�5�cω�6��9�k	M7��T(�K�auK�`�s��,�8)<T��pcy��1����,��_���S��UJY(^m�����ۚIhJ=�����xRP��k��\"og�ڧ�Wr��e�l-ʶ��ѳKx��˂�[)�m/Y�Ux����t.?(|�=�����Xl����Zĕ#{T��do\nцS���Ӓ��(����Ӓ2{OxF4���H�{��W��&�Ģ���J6� ��QO(�-a�A��Ԭ:HIXt�FQS��j%S\$����!�NȷO)����ڬ\$ɳZ3\0�uVa7�y�T�ԡ�=�h�.2zW9	���C�Nɦz_��Z�ś�*�c��F2 _���Fq�&袷��h%���R��Or9Sœ,�L�ug/z���0�����z� �]]����V5{G��Y'��H\n�Y0\$A���ԭ�m�j�h[��-����\$��YԜ����5�`�T�-G'���H�PS=5\\{��M]_��th%:�Qo(�5.�����oŵw����?\\��\r�B������}���xF���oH��&���(�>>��7Ἐ��S���F���&Cm���_V�^]�m�ϴėX�r�yŁ�|�S�k��.u��n��.�N�O�Sb��G�u���;ڱ͑P���E\r<?�������L!K3~xS�b�%uH��vSKtoX!��Jk:��s�U���6�O|N6�7�5�SԳ�g�'��\$G 9�.ш���%���n���xL:���r�3O�u��.�!g͕^�U��W�/��Z���ڸ��ڟ�E��_�_s�\\b�k�p��Aհ¢�d���#O,ʿo��n��r�ڰ�s�w.W�V-��_s�H�3��O�����aCl\n�0qcl9\0���3�P+EL���l��nrqo��\r��\"u.�����.�O��Ϥ��f�\$~&�ҐH��8�D`���Tҏ�^�Kh�@+��c��LؕU����2:���T�-�S	0��,��pR�P~/���i	Р����p&���ˮ[�\\�/�m��̪������έ0��L�|\n���ː�b[	o�\rOz�����D��\n�����֗,�6\$�E\$��ʑ\$>K&�/��,�#�+QBn	v�K\0006�;JƑ�� �\"J��KB����IM�R~k�ӑj!���A+:��f3���u�\r����T6�>�E���5���(�:� �+��il\r)P1ɝf4RB<��\$�BlL��v\")��\$� ����Z��J�/���P3Rz,��t(���R��]\">\$-H?,�am��-jQ�6��[*>b��^2F\$R:r��+R:!C�UQ�6�n��B�G���q �vKx�fYE���6q�0j�(�j���B�3�8�ȸ�B�)Ѻ�E\n�JX���*�I!���&�+Ҙ�Q��MP�+��R��@�b@ޡEF�5r�я�:d��@�\na,�>��	� ��x�D�\nݳڭʪ\0�{jlc2̓��b�\r<��#qH�1Ы2<~	0�*M ��X���Ʀ|n91����60.��\np�	@�%j>A��Ȭ��D�0��	\0t	��@�\n`";
            break;
        case "hu":
            $h = "B4�����e7���P�\\33\r�5	��d8NF0Q8�m�C|��e6kiL � 0��CT�\\\n Č'�LMBl4�fj�MRr2�X)\no9��D����:OF�\\݆���Q�)��i��M�8,�Bb6f���Pv'3Ѻ(l����T��(=\nipSY��r5o��I��O�M\r�\n�b�\\�����~�Y��JӁ��S=E\r��\$RE ��M&F*D�����pTLr��o��ф�\n#�d��A�L��:�'8����Q���6i/�j��J�_5��Ӿ���es��\"���֭A\0��B��9;CbJߎ���5�E���	ʻƥ\"e�H9�ej�9�¢(�&0�?�n��M\rI\n�����3�\r ���ɡ�\"��HK!>�܍\$H�P�4������5�cKP5�<p�h���D���C@��\ncx�1&*@ܳ632ؕ�p�ށC\\ܫ1�b[8C8A5k�&����6)2��ͻK��c�77∘]6�Ck�7,uJ�9���((�Q�H�Hߪ�lSY��el�\nu�b��#,�آ�����4ń\n@�4��8�:��|�\$���ܷP�<[�d±I���3E��C\r�X,S-u>��'[IK�a�#��T��b��#&��7W��fZ�6��]\rP�Q���o2���2m�ܳl�5�52��hP��\$9�8{��*�6.�Ӆ��� ��#*n&������(ԊA�`@��c�=@�8A�㫐�`J�\n�`���mi��P/c��7HC-�4�&(&#B�3��:��t��^Cjԍ�p�������I���(�J�}n�d:�x�1h��5HHu�u@�WHPݒ��Rٔ���#}��*ւ�c�@���B���E\r�3��@@(	����hs�)�Vt6��z��50�޾^�ޥz�bˊC4\"P��2�+A��@tbɺ&Fl�3rbxS\n������yU��!\nې�W)P:5��C;�/���jA��VV�U����A�\r��:��޼�pb\r*)��d���&!*>%6����)N�3\"J�#�l�����y�(%=y�'��xb��0���I�SW�F�:k,ŷ��lO��ipa�&Y!\r �����S��\n<�'��<�!D���aI8FP�\"bޠ�E��\\\n���\"�y`��{6g���\\!��G�Y!FU�\$�f��Xu\r����\"���AD\n�ʧ��J��\"73X�����S�	h*\"���T�Dư����xpK)l�R���\\5�L�B�Y\"F�Ȥ��U�\\	���'�^+Oac����A'3�\\2Ѣ��Iɭ_&\$2*P�	D��n���\0PINm�Sf�b(�<�\$��CQj�i�I�p�<əd��u��NB^#UB!���{`\"�9[���s���\\K�o��z��xFM��ۀ��=�R�?ﭵ��s�9�4�,YՊ�(j�֫��)\0���� �q#��ܒ�pr�X��	b\n��g���v���t��j��F�Q�QYq\0��kQ�I�S��û>�C\n;�e-!ZhEjh-���b��;8d��7��0�Kz��9�xw���Am�5����W�B��y7����5[^��s4&h���HL�e'd��5{�#U��l��KD٬1�R�b�\$��4�vnˎ�<G��#z`�eE�,�r�f�a罁�{a扦�R8�m.�,�OÁ��k�|�!(FSd��Äf1����Ȥdg��>HZ5���y��84��*�	m\r��8U/vՊ�R\r=V���=�<x��cb��5O���4�ÜA�k<ذ�������ɤ�w�r��S%Д�a�2��ŵ��R�F��sVq>�����-�y���)e��w��	D�A��y�=U���}�7ɴJN)j,��;`�	MY;Ev�k�e;��aӄhF\nH�W/�U���N�ګ�;�fƠu�Fi��;,�b�4y+�[Sr�MA4Ll۫7t,m1S���Z	�o�tg4sV�L�+�t���8a����>p/����t�X	��_p�Z��Ϫ�^�~5\\8�g�܂���#tn����̧��#Sf�u'�TU�	�1����\r-����&I���W��  ��p-��`sb���@.��U�-L5��c�I��}U��hKY���l٭>wW��Y~�*u~���ni�!I�N�29��:�G��@��ʜ��H�NK�(j���t0���8�zm\r�e��4�'���c�tr&��M�v{\n�����т=-��(E����RUo�������[���\0R6-E��9%�9���[_��V���s�1����\$��C���/տ�p���M���#-b��.�C��O��O�\0O��C�2�2�^��RK�ڊ����ߤܫ,���&�'HB���*�X3��-��̥P[\0욝n��pY�V���*��FB*�#Op�bC���\$\n����L��K	p\0������b�j4=C4���c1*������=0�=���n/@�zϠ�e8��h/,�&�?��@¤cL,K�􏂔RbE�ֲ\0h�j�\nDQ��'�d��n	c�b\0�l�l���d���9��.`�M�\0003nH�+!�Z�@�B �`�(\0�f���N\r����[ �\r �zC4(�\"C\\)F�〪\n���pzb�\"�����Gz[��/�H���_%�il#�B\$h�������\n6��lj9�?aBգ=b���0�q�|���\n�V��<hw���\"��&��;�\0���D�	�p�:�6\"D�R��E�:Ç�o�bC��9�.���B�\$���l�L.(f�lzƈ+L�&�P���'�,��l�rs�m&E ���R�`�^�'\$<f��rp2t�O2Cjj�����]'\$�S��~�ܨb�R*d��QE\\)Rc&jZ�^�>���\"�Y\0�F����	P�E��\r���Dl��bQ�e(��ݨ�N2{`�V�HLPH�����\r���g�\$��7cz�f�i\r��";
            break;
        case "id":
            $h = "A7\"Ʉ�i7��ᙘ@s\r0#X�p0��)��u��&���r5�Nb�Q�s0���yI�a�E�&��\"Rn`F��K61N�d�Q*\"pi���m:�决y���F�� �l��hP:\\��,���FQA��	�A7^(\n\$�`t:����X�e�J�J����Z儨�@p���H�S�h��i�����gK�����SD�G2��CH(�a3R�[+%X۲���%\r�e82qHR��\n�\n&ʫ>W@r6�#�����i�w��τf���9eS�6�r��?�\n��s���#�t��	�쎈PȒ�K����\0P���( ��ʑDBx;(�p��	\0*�C�����p��/�ڥ=���Ԫ,Z � ,؄ CJ��`@64)H��\$�B��\nb��J�����?�*l�Fs:5�렄:�Ü���S�4���4���r^2�BL\0�A`�D	r����o��(�����Ms�;N TCch���!�b��!�Ή��\0�4�ch@:���̱+x䦤�C�)Ne���@֎i|�aF��`4��`�g�9��|��̲*��JX ��}X7U�xȖ<,jNϥC��B�(�\0��x@ cDL3��:��t��(Q�ܓ��������,��^I��2��(�1W#XDPÄ����^0�̊7�\r|.:\r�t�V#O;Ӊ�I`��c�r��H���쮚=����(&�˲2YI�P��*�����p˨3c�������J�[ ��v����*5�b��K�@��#]����@(	☩���2f�W��v��ϒ���/:M�3�\n��+�p�4��!�B��Čmh�\r����&<�P(�*k�YC�HҕގN��m0�)w]�XzSW�=�6uaF,�6�A���H�S�3꿴���,��f��y(-\r�2:��?V��6���\$f��ڹ�<����D`	G:������\"\"\n�����T�SOOYW���Zԩd%�,�4�w\\�''��@B�D!P\"��j E	�\0��OH �G\n#D�`_Ke7Ft��ja�pDJ5�.\0��\"�d��	'�^^`�0&&�6��U�(n �5v���ፊ|����dL	\$#&Ҋ�\$(SmD��2��HJC�n6�P�aye,�1��(���5�ִ#�BZ��9e첖����\n\nH؄%��cCI�8�i�:B]�R�0�Ƞ8���YBФ�BĲLÒ�t�w�g�)�#�44�%\n:Z(���S���I8%�VdL�4�q:�Fu#2BQda5Ky%�P'�P;1���:T� Q(��	�c�l�\n}p'	�C�9cy���)(M�m^a�2�(n�M\0���\\�\n�Jqe\rH\"�G�V�\n�S�����5:��vV��<�W2�EhO�vSPi)�J���q�XGI����#&��[��J�h�*-f�FMUL�ֶW����gHʸ�U���n��KX��򔧕�A�%bR���'d:�y��*m=\r)�����F��h��&Ѐ�9&�ɪ��;�X�j�������ȡd!��604�RFf� �p�L0�EpHdx���v�3��U<���t_eD�n��'��}�3F�Y��x_[ܼ���M�[g�-�.��8ۻ�O̕�7L�^e��唲���\",ʑ@���D{���7���ͨ(f�	�!\"��jW(l�31��i�0d�A�N�\0�Z��t.�F��]K�\n�L0ŗj�_� U����́9kV�w#����p@���d>�++��r9@�\$�%��\n��E�ȯm��PԘ��\rZDc2oMAnʎQ38؛�Yϒ��^�����Ư~�Yt��n>���>Kc�Kt���:\\�#opԖ�KKh�>K\$���t���iåK�MW��t�L5k\$-I_M%�鑓�Q��\r�ڝ�4����ai�;!� fD�P����ޥ#[(�\"){��~�3���ܚ^B!'d�^�,���q����s�<�`&��x�H��\nF��X�m���f�^���id������м ���'8n���44�-��PpW6;Mh�tu%���ZO�\"ﻭ���܋c^x:�CgR�Z��q`�c\rs/l.�[�PS����\$���\nYh	���A���tH��3hXc=ጊ��n�fIQg���-@��	`FPDm�n��\r F���c�G�^��^��\"Y�	R˨q'�z�B�Q;�Ի�8��U6��f��ݷ,*�%�40�H5j9a1ڝ����dD�l�,n��Vq�[���=Al��@)&��_s�L!��˟���xp*G�6{�1��fH��9����(MY�&+��N9���~�[�!�H.M/J[�3{�TY�e�	q���9����b�=�x���}LȰ��I�FBI=��-�A��5�Њ�5��1�1�b\r��";
            break;
        case "it":
            $h = "S4�Χ#x�%���(�a9@L&�)��o����l2�\r��p�\"u9��1qp(�a��b�㙦I!6�NsY�f7��Xj�\0��B��c���H 2�NgC,��u7��F����n0�D����b��%��e|�u0���;��`u�O��ڍRi67h�:M.�P�U��ZT4�0Q��铰��[�R�u�DADC\r�� �\\JgH���h2��U���R2��S|SXi��j{r\n)�NGnU�;�(N�gz�G��ζ\$�W.c0��a��%8r�&��Ĭi9�\r����`d������5��聮\"h�2\r(��ς�@�D�,�B������#c*f���ʷ�Ќ� � @1*��Qb���)Ē.\"2�� P�3��F�hs��+j��8����9A\0%(�4�<��V�/\rx����G��t������#r�ͣ\"0)�\"`0�\r�6�,�o�*�B�&�m��!�I�SE5TL<��(\"0j@�BH�8+�x��\0TB�!�jE\rB�:Ҹ�N�DQ��iǋ���B��5��\0�)�B2��ϯ��\r¿�b`��#J�0���T��0���n�@1���1�#�޶\$1v�2c,6���,��VҪ�E�����!e��Ȑ䚦5X�\r��`�+�O�?��Z&�J����(*�%!�`x�\r��C@�:�^���]�\r���+�8^��c�����xE4�;s���7\ra}O	>�|��\r���(�s`	^@�M��[���/<�.�l']+�+�+�0!\0�\$\n`�8T���\n0R��u1(,z	�0O>4ق����0��0�� ��ܰ��#/��pBx�*Y��Ӂ�W�0˵<?ӄ�c!fcL��܃r<��R\"n�����:�shAÍ�~|EcH�N�b���\0�*p���O�;H莠�j�9��Z�Pq/d��[��[��g��˒�j����\n�2�\0܆�±R��\"�\0ܹ]�cj�O��qi�+�\0��:l������)FG� �R0��*�H��Ĥ�zL��W�cR�R\njH�ĵ ����o��g��ph84�1���\$BH�<'\0� A\n�F@@(L�����CI\"R,�Q�&nH\"�2)�&%�`�#hpG���v������&�e\n�+6�\0006�\$|�J]0E��&0��\n���\"Tb�*ݰmCG鉛`�V�o{!�)�܂B&P�~``��Olmr���&9��!�5�3����*�*�����'�|�M3t�֨�Ñ�(�Ġ�l|U�6A���������0��&�T4���k%^aʛh�+p�Q]6\n�\$�^�	A����a]&}�.���J!�Y��/Bm��|���l\$}%'k��3�Ia��NN��\"0�R-��j�7THi�K�\\�u�\naB�-O��:�2v��zԏ�X��cXH��|d�*B�K!�p�B�\$%\nT�i�\$`3�:�A\r�#������C�s����J�5\n\rqZ��(S�JQ*�\"I�&8*����FҸY��e>�ͽ�Z�#ױ+���ـ���ht\$�z'��PZpsl�\\8(\"B\"��MK�)��r.q0�l&���i���%O\\��I q��Y���I�%�&���c��0j6���[z��|B��^�/]���>�&t\0�e�]�\$,�D8<�M������� �|����^\0P\$2_>��?�e\0o=p�+;Ê���\\w��b�&N0�pbP+���t��9I�8\\2!=��H�c��Dˌ�3��q����i�\r�ia!S��r����X�R\nl���ʤ�P��D�6�*�f���e��-@gY��3����`&U�v{+�ri�`ӑ��m(�^hp��0F_M8b;���t�x�\$v�g�0�\r����h�J��.�A���Y���q�W������P�\"nP��D���R?f�>!;��)�C#^�v��J���:�b��?-ɗ�o��o��*��n�B�L\n7�l�6�G��yu�:so>r�ݴ�c0�M��x'\0�\n�L���E���<��������\"�~+��!�7\$��@�zW�	֛GŃ�ʏ����&�şo�~|Ì��E�\$�'�V�:��f�~s�/��t)0e�����j�te�rݓ28�tz�z��]C���'#�Y	�=���wL�=U�u~��;�O6�{v^���Y��r-��̟�H'F��pX��L��Hm\$P�?U3MfuW�A���H#�b2��¾�K1b��y��%:G���{ ��9�P쒥*+{(m�I!��3ܷl�LC5���3��]s�K&���?���ͦY4W��(U\n��������Y����I��_����qKh=��䌒�{0A��E��\"�m\"8>i��	��\$**b0�����P6���.8��`B�%ǴEK�^�bJH9B0�00�M\ni��]�H��!��+*x%ˎ�\\^�R1G\"\r�v_�V�D��\0_��2Pk0p�Pu/\0͋�\$��M>-�up2>�&�Z4�8d�D=����P��K�\\���PI�\$��eП�\r\"�4GlK�|,�\0�x�z��\"�B�n2(�9fA�O�L���(�����.j>�8Bd|M\$<�F�'(>b�	\0�@�	�t\n`�";
            break;
        case "ja":
            $h = "�W'�\nc���/�ɘ2-޼O���ᙘ@�S��N4UƂP�ԑ�\\}%QGq�B\r[^G0e<	�&��0S�8�r�&����#A�PKY}t ��Q�\$��I�+ܪ�Õ8��B0��<s�W@�*TCL#�i\$\n�AG�S�,�ƀA���B�\0�U'�NE��ΔTF�(H2j?wE���dZ�ʼZ��0\$�M�_��pe4PA��:�Ω�Q�c�/)@��u������kPs�a\0M9�ʗ*y=J�+iy�]J�L�\\�d?mʈ�G{�\rUT���h4Dq_rAV�Ѵ�>U#��N��#��8D*�;�Ԑhc���A\\t�,R>�Bd ���H��#�ˑD��z9	9�ʨ��E��Y���ps�Ή4�8(�i7Dp�AЙ_��9t��I��+�I(\$I�M���T�+	],�r��P�96W3La8s�\0� �Q�[�I6C\"C @�*�a�@�1�\$�Ds; T�CDpa�R�9hQ1e�vs�{��C�2F����[R�\"z�<�C4t���d�d��è�6��1\r�(@9�c�\nb����h�<�Y�]K3\$\r<r���P�aR�I-K��A%��=2\\�Ҙ�d��_��))�t�|I�L��8N�Pb8@Z	df�ȉI�`���\nQ%7N	\$����]�UBP�P�:LYpF��kV@�B�)�[�����r��!\0@�	\n�5̓d�UR�#���]�H�dA�vm7� �d[kh�g��Z��#��4��� ���\n�iQ���E���h�c�iVY� �]�ȱ��0�c��9�9��x�?���4�C(���\r���C@�:�^���\\0��h�7q�w,3��(�ޏp�9�#~W��3���P/�0��H�8X#o|:�x�6��:\r|�:\r��5�CH����m����:ϴ-�Ү�2� ��c'\$�\0�[�4���\"\n�&f���c�}D)l������d,���#�#�{�4����G\r��C���Ĉ\$�@��'�5�>Ί�\\#�Q��_5����6uBxS\n�!MD	7\$0@��΢��Ce4A�L9E�K6q,�%�\"�	��B3����bK}o���A�\r��:�����A�3��\0f\r+`���0T\n\$7'���ܳ�}�D9�ڰ�xvw.	�����IL����\"��8�K�����X��ac��\\.�T;{�M�>1`:4K���%�Ifi��oN%P��F� ���S\nrظ�vB�sS�TTJ?�Qh�5<� ��@����)�ah�{�����DA51J��(�R*�r��<G��b��]K��G�z�N�����' dF�?��^��#��Xt�2��	��B@DQJ,�xNT(@�-@�A\"���Ra�Dh�r��\r��l?j�Y6#*#��J8@\n1�%O|��@r�H�Z(1y�U�ʄS*:��d��i�K䒨��,(���N�^ę�ؗH��F'��d�O��\\�v��ZoHW\ru^�I��?B�YT>��AZ�b��w#��u��\\�C9?'�zR �\"�-�]/a6[��\\�!���HBU�n1�@��r�cl����i��b#�|TӐJ���?�zܜİ@oK{����/�C�	r�7�\"��[#�dA-��Q].�@K�wo�����m�)Wb�2\r��T�!�H���A�1������5�hB�����1�h�J��)�V��\" �M�_�1P9�!k�ht���p��\n�1d��M�F)��bs��t�C�X��Z�G0��G�%ئN��=��К�dC��f^�+� H�gM)��&Y�a�z<hQ/�jV��\$sh�#c��2����i���5z�d(d.9^��ө�����l-��b��ÙH�L��ǭN��)\\�[�.��]��0��+�����h��b�e��m��ڻlj���Vq�V�iA�E�\\D�����[4U�7�Sj��{���5Y�����ݨ�v���٦3�yļ���	�HF�Ֆ3Y˝��K�И\\n[�t�T�17ڄg��-c%�kn'Ʀ�2\\�j�>E�&:�<�m0�HW���ݐ�[B�-L��:�����(�����\r�ϷIc�e�f@�����}���6�I),l~o�l�W���RSN�N;���VIoeH���p�1��V��w�%�l^�2'nDy�LK�t�6Z�f�*�Y�.�,��)�jb�\\+Ł��拿��2�x�_{������\nI�%i[�w�߷��T�}�|�_��e��_[�}���h��[�����O��kLE�T�������>a^#�(�1D\0ާ���m������2��T�F���P�o�Q%;+�k ���jc��f^Lp0Zp*�\\�bYc����>N	�N���m�0\\���O����u\r��P8#�|j�p����M��n��y�o�9C�9Ö����͘�pw\ndB9�Ąд��^�˱�#�	��\n��C�\nKV�\\�M������kZJ��D,i\r����c�E'���d���l��>�0]��/� �q��s� �+���m��a0�A'�R`�,�(x;�Gl�v3�nT���/�.0v?&�C�pR#\n����~QO�O��M�;	-�fP\r�V`�\r �\r`@x����\r��XG�|G�\r � @}���&X@��\0�}�\n���Z\0@w�� �����\$�`f�������J�����N��Q�D[�&���\$�e!l*�,�Bz'�0 ����v��Rf�\0�rń�E|-�\n��j��8�f*\$�P��X�\"��rN�v�k*\r��l\n#�(.P�\"���@�\r�\n�~X-L\r\r6XQ�w��\0���G<~���\$»ﰰ.��f�R�%H��+t�np긱k��-(̋*X7�<�\r(�Z'�:���8��(bV�e�Lc�@�R�)�ʪ-\$M���%��%#�V��*���E�+�	p{�>Pl?�\0�bz�ʬQ<���u2�t#\$";
            break;
        case "ko":
            $h = "�E��dH�ڕL@����؊Z��h�R�?	E�30�شD���c�:��!#�t+�B�u�Ӑd��<�LJ����N\$�H��iBvr�Z��2X�\\,S�\n�%�ɖ��\n�؞VA�*zc�*��D��\r�֊L�����=qv�kGZ�)Z�Zg���\\;�K�	X�M*dP�Z\nF�&R��(�����e1�vASb�+aN��s��0�Z�qO\"0V�&7���#��aژJܑ\n�\r�X!N�f%<�v%�b���B@�X��1�N�rY����U*e�ޚ5aZv�4��+\\�d[�v��d��+�붅3�\\��Y`@e����N�����C�yH��Qnē��X@�E�P'a8^%ɜkE���?���	`�e�>e�\0����/�D�&2ek�T�9������ �Ĕ�22I����Bi� �A؜.S*�!��A�.�TT&%��eX��QNP���&�����\$�ʡ;h\n@�è�6��1\r�(@9�c�\nb��\$Ii@\\ю�A?�,5���]\$�e���Hu��D�b����e٨�lJP�~��OYl����?\r�Y.�/�J;�,N���'/k�),�d��!�p�:�B���.V��f\$0\$�9�C`�9.K��]�d�f!�b���ӉX�B�JK��iA�9�:����M�p#B��Tߴ�CRյ�lvg��Q��\n�f�Q��\n\"Lbx�mwG P�0�c��9��9��x�4���4�C(ɐ��@4m�0z\r��8Ax^;�p�2\r�Hݯ��0���w<k�p�4��pER�#��2����TU�XD	#h�T��h��|ׄH�4\r�@�7�#�U\r#�ï��wT��L�<��-�.��R�\n@�̳u�@*�MƏ<'as�K�7K\"<��~y��S,�&Р隐�)�<\"�&��J^#��,��7O4��^:��H.�S���Z�	�L*\$�x���<�V��/^q����Ҟ� H����bh��@����RT[ڤ\rg�A���A�\r��:�p���rA�3�b��0iU �;�����Uɠ4�f��� ��7��V�ó�jmU�B5��V_%���u��Q	�����@' �7��7����JpNBu���%S�ΐ�b<05����^���3����>�;�� S��*�!��TU` z/Lv�W�U!D���� �Y/3�̇�P�Ī�Qe�z�����`�65��)f��\$*}�<�zo��\"�u�g겦D�A<'\0� A\n�u�ЈB`E�j�!����HD�V\nH�R�+I�F\"]Dx���N�3����[\"H��(:�H�M��k�iN\\��v���q#��&�|���d��L��J;(�g�A�!�+NKO�E�\\���\">RU�H�aO����\\T�eN�L\"�\\�eAN:l�\$�d��j�0\n�\0	F(�@�gn#Ď��7Ƙ�e���`�F���.x\\A*hS���U�G���0p2A�!�X�2����dDI&ҕ���A�H���	�Y{`�,)�v�\"FV#����6M2NJ�i/&'@��)��HH��vx��aJe���2`R	�V�q9Y�0�	\$s�z^\"\\� [ �W���^\"\ro�丶��N��@�\rQ���H\$ɰ�Lgu3t�|M}���:%T�h��;i�K\\�jPe^������,����z���i��\0�b��sa�R���^T��4�EL�+BWfqC��JX��6��C܊g2D�dP�N�[ȵ����Q�z%�΄��>fe�4��6c7���e��\r.U�-�ľ%�&WNlΫ���._��W�Gݜh!��\$�m���zŅ���X�7�p�r.T�Fӹ>�'�(�Hp����w����l���({U�g۟l�jB���c ��\0��[KI��vp�\r�{	�iX���jj[.J���_�C�Z�0�as'�a��m&���n��Go�z�bf1Ӯȯa�1Zw1S�Vgm\rͻ�Q`�?�}�Kx\n��KC�ԙ���fo�h��Z2�DzH)r���R�:�D~1�J��wYf�\"T�GI@;n�tO������\"�\\`���J�` �xJ�[�xGZyw6�j|v�������۲�|(��v?���ָ����[�-����]���v�e����훬��\0�D�f������еH^\"X�a6β��Uƹ�����a[�/zx��%S�8}�Lի�z�����]ڴ2�=��x��Bd���s�\0�O���_��x��[:����z&?u�%y���r�V�*k�5}��N���������E�c����Y���s�q}o�@^}c�S�����Y!�y�o���5�_�4�������P\0������\0�ت�������A\n���Ao���.���� �k��m�(�e�\\l�òQa�[�F�nNʀL���^��\"[#6��<Kg��m~�af��.Ah�k�v~P|����\" (�#zf\r�V`�\r �\r`@r�����\r��UGnv'j\r � @w��ȤU@���\0�w��\n���Z\0@q��\r`��0�a�&}e�\"�l晬�aI�G�01 LD�L����c�����d�LC.+����B�NP ����p��Qb�\0�l�T�LPK��Ad��\0��4f��U��L�^�\\!�Q,����v�Q����P( �T�RƌP�P�q��\0苠�F�,���n�W�JO��P#���秎S�6��r��F;a.1�8P���@b�}iQ�Dx�RH�jE�\n����� (6��֭*�Ch�-L�3\"�v�t�dF6J��j��A�RB>\0";
            break;
        case "lt":
            $h = "T4��FH�%���(�e8NǓY�@�W�̦á�@f�\r��Q4�k9�M�a���Ō��!�^-	Nd)!Ba����S9�lt:��F%!��b#M&Q��i3�M��9����\r�Sq�6ib��\0Q.Xb��'S!�;��Mf�0��i�1�B�@p6W��B�rs����J1ΑJ������J��#�H(�k�TjzR!��a��PMD4�e�k�C���e�֦����l��̦�o�K�`�t�&��e�錧-�^����pҟ �b���]�'�n��U�QC�i5M�{�B���s��/�T��#���#�\0��,����0k,9�X�b�c�\nC(�0��L; ����1J�#�ʍ����:�h�^�*謊&k�[D�(J2���2<���\$�\$IP�fA0\\4҈���1�z �㒈0���2��c�� #L�%oJ�5%H��M@&%R[l�2Ȱ�6+.�ʀ�iZ.��cD0�K1�#sL(��\0�����5�LF9B�+S��<aDR\$aB��F�m�#Ø�4;���P��b��P�\\�#�K�����J���#T�	#h�7@P��\\l���0+����]��+q��,�3A�b�h�`U��UR�-�H�懬ɲ�(���)�ލ+l�@!S�����+M����l�\\_�b_U�\rC:�\$�T8���k�3�C(@7)(c��2��Т.B<�M�P��]��H)��nO(��J���Vqj\r!pAl��2��0���o\$�e��Ä	�ϹC�<�)3,���\0�;��@�<L�2lA�`4L�0z\r��8Ax^;�p�2\r�Ӷ*�8^�tc��7%#x��T��3�x�LӣXD\\,C�|��x�1��:\r^-�\$�@�ûiZ�������1CN��,\r���/�%��2*6�\"��(0�I.ű�\0P�) ��)��%:Z��uS�T�!�2��6�hKٸ&͈�Rjً�:\$�A�\"5b��xS\n����@��Ⱦ`�+�Z`Yp�7���\r���!��Y;<2ƹ�/x\$��o��N�Db{��i\$�A�@G�[:/��#G��L\"�\\��`�sa�;���6��l��`|�,�S֣}+iԲ�(&P3A����捗��mK����L���\r፪��t�	�!�,��:o�(Bfe����v�haO'����+P��V�~ѩ/5�����|,��&��c��_(�jY\"�Z̻4�,�����3!9�0�I\$	%<�\":�_)��e�ZS��p�V�)�)��b\"� {\\��\r����>'1] D���p�q.5�ѤP�L� 	!�1�c�;	)ᴯ��\"��/�>QŚ�I� d5l��U	â�����^_���-'�푢8G�I�*x�I�]��iEEt&L7�<�\$k47EuR/A�j��\\�(�%���)�Cj�w��T�M�\n�\r1Y�P���uk]/`�،Le_�	V=eQs�5ҹfء7�I�S\\WdT���o�A\\D��Ս���,�:��3��������9��R�&��I�:؝@Ҕ���J�V�*i�+��A)���w�mݲ2\0&��JK���~�2�;�� .����#��k�����\\��6^�a�'0Ъ;�jÝ�I׺�{��.�����������ܾ&:�_����\"�b�v�0pHl480����aZ�@jt)L\$<�g[-��a\n �:�Dt�8�v޾�佴�㹌y���x�(�>TI�*�%�Z�rE�	Ć�k��'rj@+'\\��x��AʲJO'�gp�T��#���:\r�ث����^8u���Bl���e�E=X+\"�bs�pƊX����*�����=����U���I+/*q_o�J�����VWW�O��5��I��6}|j{�f%\"Nn���\0@j��/a��i:>K5ӆf0�}�c'���3���7GWU����ٵ��B~��t)�:���B�Q��cP	�Wl�}W�^9M;V��ZZjR�l�d>�ݚ�0o߼�����o/ǽ���S������˪�Y���M.ߖ;��-Ck������G,5 dx����6.Em�����~�q���.��3�mS3bf�*���i���Z@Ay޸�~I��J8D���^'�k\rc8J(�bp�2s���M�t�ӈ�\"\$w80�\rf��4�m�6M�ei��A�R��j�WƆ�C7���GH��P���(r\r�ija/1�)��([��^f�N+�9��Խeò���[�)�O�P���߆�~�������{>��s\riV���\\G�%}>�m��C�׊�nɾ�?���j��O�tbY���5��?��RX}a�	z�%��iU�[@|s�!�����?��h��>����J;CP�ʎ�Cp6�jp�bH�b�X#p���R�m���l�j~��h0(dcG	�殬aϾ��H����nJ�0e�\$�H��E�<�����;j�	�h+�d�C��#�����	�F&Er���X�<+GN�h*�\r(�D� ���*��a�A#�C\"�I���N(*  p��Kq\r�T��b�Kk�\r���jBAP���LuD�I��Nr�1	\r�4��t�0�?�3k�G����\$��t-@d\r�Vf�lPuH�Ƞ�gJ\"d�j��z�'��D�m�\n���Z���a�I����j)�q��#*kq<�q�#���0yØ6\\KD�bM�CJ\n@�)�V!¬+�Fs��V���4*8.�b�I-d���V�&%��8j^J�Ph���� Ȕd��A�D�~��H�j��(�@�Ǿ\"�#�*�Ʉ��┪|3Ƃ��B*p��3�S#\\��D\n�0,b^�{\"�\0�<�\nDD\$�T��b/�B:��M�n��C�V������B�C��j�e���m#�^{�P�K�4��+f�\"�f	�s��?�R M.�Âl�\n�G\$	��rO�(���\nx��~-�~?�j�*!�(h6�NLJ�g��Db�@";
            break;
        case "nl":
            $h = "W2�N�������)�~\n��fa�O7M�s)��j5�FS���n2�X!��o0���p(�a<M�Sl��e�2�t�I&���#y��+Nb)̅5!Q��q�;�9��g�F�9��6��,�Fl�MSR���q���GSI��e�a\$#�O�7�#�1��D9׎c��αZ�Q����d�a�8Xm(�23[�,5\\6e*<�\$�y5�f\n\"P�[�|�\n*B䠢��i�#�	�X�;�p�3y�k2����.��v0�䇟)��\n)�N��VXr9�����4���98�8�1=/�7%�;&�#�R(�\r��68뛨7*oR�1�m0��)�*J����9B��;�����Q���)<f9ƠP����ҕ�⬆������L0J��C�V���݉l�#�tA-\n�r�ߋI���俾TB߈#2^�%`��I�C���#:V2�w./	T�\"�N�\n\"`@7�\$����L�����E��C����z)��p�����7�\"6�����(p<D��)��~\$����\$�b(�aI[�#�l��\nX�#�P�Z���R�\0P�-\r��X�(#\"�b��#'�8\\\n�h�H23-I�<��セh�魙g&n�IM��\"j�ǌ�@� X*8��K��!(��*�V�*Lj9���}�w�� �+�Y�/W\";s#��:c+�&���z�P���_w��8����E\0��t�㾬&#j܆��P��{.�+^PÒ8:i��ġ\r�XDX	sܙ���^0����\rzR:\r�x*(�X-�p蚮x+,�+�>%�Ձ\0�\$\n'(�4O�7�P��9�p�8p�{�C*F�0�}���(�:��x�*��L��j����׌��-�o��K�4�>N7��Wr3��b�kb3�j���#zE(��\\�%58�s�th@����S�§:Vʊ�M�%���zz��j&��9���I��A%M5*��L�\$[\n�+�ވւ�y�l�\0��S<�T+:W�]�i&^dY念2L��;�\r͹�&��\$�34bٝE�5���F̉Bb�����Ô�\n�n+��¦r���Y�j�������	x|ň���@B�D!P\"�P@(L���\"wO�a=�A�Ȧ\"�I�\n�����f��ON!Wq<;ŭ\n����))����N󎕈�ș3n��?A�<6��.XDX�K��֬�%�� ���(��\$����!?.1\rP�TF�Tl�P+#~Z5�\"t���'2#\n5�7�^[�2�Y|,Đ�'\0rVB�^���EgaЋ c�b���p��pI�Z�u!���̕(�7�F� �A`'�JB�2kp�<�J7J�*6Ե*�g/L�[�r�H)#��)� eBƄ�Fi�s���2�)�:�4��RS�Ej�U��f\\�d�h��%��%d�_}l(���Ŷ(�an8'BDG߻�R����'�+�q�������\0b���ւRUk<��5�:�W�yR�I�|T�LVa%\"2(�q��5���P�wP��m{��0��O�B}\$�2���C�kE���Z�hd%س@�ঐ���l��T�\n5�7�j�z[*\$���߼����:8�����-��QV�_�ML��ȿ��x�`�\$@T�kp�ұV*X�\"���%!���\"��?vBVV�3L��N���Mpn�,�'��>��R���S���hz���6��n�����u\rc�Y��E�Q4F��5����(+E��UT�r*�}?R=+7�7�B+\$������\0Nd�٢��ZYK�-\"(��7�*�<m��A�}�����4�M8�Wϥbk�ӈ��k�RŇ��cLy�(6cn��9,Ua�7R���d-�8�c���D*6�%wW���\$t��[�����Dh��p&��./(��I�wI�eA�2�\rII��Fn-%�&.ݜ�8P���侻��o���� i1��K��7mT\n���֬&Y2�Ha�^�S��DXh�.�Y�̴��,}���LB��pq��tr�KiuAp9�ɹ.G�S�a�\$��g�5Y���\$5I��A/�<��軟��\nX6]-�S��>�ԐN�]C�3u���>�܉r�ƪR�F�Q�+9�['w`Ʒ׷Ω߿�L��Ge��;{���h��wr3��:<;ꇟ~塣�!���S}��L�Eμ2q��i���;��ViV��]��4����bJ�*D�A��D��\\&�.<%H'J:�m���q!���PC\\A���<Hu�d�r��m�dB�Q,�'j4`Ң	�%(�\\*�@�A��|+�\n�Z{`7�b�,��aJ��߇.�o�YK�#4(\">\$-��\"*#�<���O%x�D����\"<n @P*nE'��%�����Б��?@SjO��~3bbӣ�z���̌L�E�4�/-��,�L�(��%�H䠈Zp�`�V�bR����	�l���lm�@��Č�p'@�!P�.����^\"�����(�A-�B�@�l����\0��*O��\n��Wl�P�\r���˴b�`#��>��q	X	�Z�,�b\n�*i���(H<'�\n� �+���N�7l���̻LDCbT8�	\0�@�	�t\n`�";
            break;
        case "pl":
            $h = "C=D�)��eb��)��e7�BQp�� 9���s�����\r&����yb������ob�\$Gs(�M0��g�i��n0�!�Sa�`�b!�29)�V%9���	�Y 4���I���2��FSЀ�m4ǁD(�X�a��&�\0Q)�����G�<�zF��� :�O4���n2��v\\�\ne����B�U��W�\n�ҷ5'��t���(�u6�&3�@D0��\r�2T2Ω�KY��r����Q�oܝV�Q3Jy��Cф�&0�AE<���\n*����H�JM��Mȏ7c@-'�x�:��һ�c�0�����T(\r��b?:�c�ꎄz�4�kC4����#�-EF)	�\n\$'>����Ƚ��\0��#_\"c#�5�HK'O0�<�R��a�c�8C#\nbè�5�h  ����4�\"��<�P��!�0ء�B��H���2��(����@�ߥ#�\$���;�:�H\0�7\r�;�+��Π��K �!l���S#�<��<�-�h@)�\"`7������O(ର�=13@aEc���8/�s]��p�hQb�����*�/������X�>o��.K�H�0TX��^]86@�`�i�k�X��-[+�d\r�\r�lK���6`/��6;M�q�(p����5�\0�)�B0]Y�r��(C�攌,`� ����0��R��׼�#�\\�6��~���>�1�0@7�YyG(#�*4�A\0�\$\n	��9�J;O�CX�@�<����b�.1�c�.�_�T��)�p�H[�9���2��~2d��4G�0z\r��8Ax^;�p�2-��H#8^�t��7ACx��Q��3���&/�Y���p�A�#p��|Ύa�4<q*V��\r%��I�!�&�br2��3�F)wϲ7�7���1�X�ؠ�%�f�У���\\۴a�*U0�	p,�@\n\n�)*�؂4��a�w@����`��y�䝨 ��A\"7��Ç�\\�\0Z!�ܝS<`U30S%�����h�\\\r��\n��%9H�uC�b,ЬL��̊�� H��4�r:��T`P�,��J��w�ς�_C:�V��*(0@�`F\n���\$�һ��ҍ�6��0��6	Āޓ��`��a잕��CAf�	�A�晛ai%���S���_��T�'��4��U؊Hz�N%����[�3�A�?�^�PA��0�NC|�#!=�������r]�%��B����G*�Itlz��ѐm�r�6J���!��׸��&�,6W�a^M���!f�^\nꔀ���I\"yia\$j��?B\n��.���Ҫ�z7.��0����JP���yH�('���éN\$74~�W�8��n�!ð�I�a	g`��x�%���&x���;�\0ήк�15Q%�S7jفE��+���\\M�C����\0�hI;���Wtx(��B�s���Q+�ߩJ��Sy>����7��RO;�l���䪉I\$I�\$/D�xK#6����-��7D	�d̚R�?�|�}`�R�6&�ڄ\"R�Zʾ5�J%9�Q�Y��,\\dr\$�@��2ԊG��C����yc\"!�Ξ0�;�����|�h��p�wb��)�:���]yPu�\$��]�}v�}��&�]	�Ń>����:{o@y�Wʹ]FxP�D��	`�)p��i��g\0007k�P/\nN�	�B3�9u]�L#Dr~�,c@Zj�c��C�\\j!� \$����\rB�0���6��)+�/�%�\0����6�P�����u�\n��e�͍ԠH4��)�x�N�IIvD²�`C�ВDJ�.GАy&�J���J[B!��4�����ˆ���>h��	��H�h�V�KV\$8݆��A�:&(���\n�~�k	+����5\"iFh;YS�P4�aV��r�Pt��E����v37��Sd_�M����M��r�q�@&��Q/�T�-��*va�a\n�R���`w�/�J�|�b5N�=������fhJ���`՚N	\\T�j�eNu��8)6�^ްx��v�~�[>Aq������\$k���\"�7 ۴��Z�������p��(V��X�m-u����J�zu�i�v��c�s�X�wdy��Z���ޕ�H�{u��ٹ]�3����9[j��ٝh�v|ϰ��HZv�����e����~�x�<��ŕ�?n���ΐ�VƐ.d �OQ�v�/���5�:B�׺�F��+�Q��PY����,�uHЁ�%i\\�6t�C�hn4�h锪�\\r��(��BQ��ZՒA=/(��?�i�+w����\0W���h���\r�̰VC�}/X�Me�<��vr�����3�!-�\n��O\0�.�����'�E��F\$�Fp}Ed��V٩25����#&���� ��5\0�l�Ԫ��p>,0�f[�ɣx`%\$�'\\!��H�\\e�n*28�Xc�\\o��j3B���R�N�.��n��/���I	��尖���-���F�J��^�F����TA�V_�\\L���Y��Df�@J5c�9\"h��s	�(�ƽO���M���\rp�M/�۰���j�p�_��Q�CR�A��\nJ�и�bm�y\r��UK(,�:��>i+&����!k��;o4�0Mk+\r\"ʲQX��*<�m����^�l��F�c�>Q�*�A�!��m��-|@J �8ǘom�\nCj\n�>��֪h�\\��;��=���b�C���Բ���d�����1� J�-<*�� 07��.\r+\"é��������K�Y�4��켰8��K�lc�\r�V\rb�#�\"��l�� E\n�d�9fb�l�ҍ�b[����@\n���Z\rF���9��&�@HN�(�^��INv�Ҥ�☢j�R8]�v2r�*�YI\$\0�?��#�\0�#���\$@ԅ\0�(MQ�<�6�\rr���\$��R#UR����;K�V���4���%�\" \$&(F؟#Δ:����� ���\r�.02�B\r�Rbb��Q4��4� E�'Z�`��. EO5I\r��sd��-s_8R��@�J�Ѳ�83L8p��b�&\\Nch�,M4,���M�\n`���,#Ļ�p�<��=/�'I^\n�|�T\rE�,#��b�,)�\"�\$D�H�[9�@#�nf6N6njY5s[\"�a\"�C�2΀Ia%�B'�!0hW�12,#�z�4��	����AB�%�";
            break;
        case "pt":
            $h = "E9�j��g:����P�\\33AAD��� a�Dy���V������v4�NB���u4����QP�m0��sl�i6�̒Ӕ�c���2ЃE�L��\\�?��f�c	��o�F�9��a6D�Z���m&)��4�&J��U9ʁE��a�Jΰa�p 2]���t}je9Ү�}�j��\r5��P�̙�k1�����gX��]L���(�a�ID���C0���k_���Q�o�,|bf��&�Θ]P��v2�=9����P�W��C�{�\\o>3��#�P�7;L��+�[�48�x�2�j�Ε�;�lô:��K��`ƕ	B����(�CȘީ:K,\\���!0Q\0�0A(�C���R\$��?)!	0B0��.ވ+�*��1�Ϛ^�%��@6\r��'�NS�c�01��pL�'	҄������Kj�)\r�\"�1A�,F78��r׊b��(1s����-E�3��2LHlʿn�T:��2U�5#���u3z(,i@،���6������6-���#K�'Fu���CF��@S1ZS�l�@#c����ZLb��#0쁍�rf@iDH����:��R���-��Y�uj�.��2)��2�K�5A��x�L�2� ����&�~<�-����!b6°�JKNH(�Z�pbER\rњf�9C��4.Iw^2h&��rV8.Ø�Hj�M9�p@V�D�3��:��t���93��݅���ۅ�p�^.)P�2���F'#XDXc����^0���@�r�ǌ75�:6��:���H44*�)��􀜓\ruk�2{�>̊@��YYC2)aJJ��+��\rɊF�\n9�	�<��B���,Gb#���=�fy.���(��N�J��\nx�*T�T�n�0@3��sU�:C �=V���>�i`���=.�g7�b��Hct���V�E�\n!�����yɀ	�*3=+�`��Ԛ�z˘b�O�l9�]\\�V�(W�\r�luR!RJ�[S�d)9�TH����U�������!��=���@�6���s@!Y2Dh�'(`(+�>�\nX:q�\0��RjU��ȗػ2���xg}�(�ƨ�P�h\r/���0޿`y5.e�ޝ\"�H�@s[��X�oY۞*Ŵ���w��4f� �b�@�YvP)D�\$�xNT(@�,��A\"���.��T��V%3��&�\n�a�#�B���,	𜓹`*]	!�8���E�\n;\r�@��Z�\rQ����3�9�,�����S�,�H@\"_��f.k4<	���d4l�x�I]�\r�1��ZLU\r\0��\n0�\r�l,���!��>�K?E�p�DT&���_!�TS�goa�,R��\\i�;0s���T�Y�Z���r@dT:�8�^&��P&���� <t�>��\"Tլ\n2��ԇ'ѺH��P \rZ�qGI�����\\��g!��*`\\k���%���T�k��cv���:�t�ROȋ�Ëc+�*&�&�X��\$�!W����Vk\0�=�t���S^�㬁V���h�Kǀ@���V\\�z�%�E蚣��ze��\"I:��Ҥ7s@�W�%��x�R��b3����zIXw���T�VJ���A �1fX�2x���9��ZQ�u��\0�Xc�]���)\0��L��Z�2��y[�6XϜ�ŀErc�ٙra�8�\\CA�o*1� u:��EֳO7343�T�`��\$�kγ���3�2=2mD#�@���'�\\\$�.���Ĕè����\n��B�xϜ�X��#4�՚���I��a�\0�\"b�hNF��Q�JPr��4�IRQ�Ze\\����?���L��!l=RG�<:Ґ��&rn�Λ�OG.j��*�9|��\$+U����J+�v𮰒��T�Fw(�ą�u��Z�#c�\n�v\n؍�b�U����Oa%\0,���X�9\"Ϭ��a�r����y��^ۍ�sk|���ᙘ��Ԟ��H�q¹�����\"AS1�7A̠��ʍS7*�{\$Y�\rFYyڀ{�EoH{I���ڶ���vI����'������V�9yU~�~L�@U�s֗\"M�q��U���s�O�4����R���m[��t�����4��O���d�:�`ՋҮ(9�H\"*�(��/5��`�*���AV�Ze�����z���`�w����B�JIQCuy�U���8��3%9��_��vh��HW3Ҥ[��!R^0�T�%=2�?�y��>��z�G�wN�����#���7��&��ym/��������	���g#�֠�o���8,�Ｂ=s���f�~��T.iO��	\n������}���gf�/�a��]c>��ᄂ�����Fn:p��>d��*@�&��\n��#ǣ\0�3`�M&��J<b�-,�H\$�OI:�k*�06tm�ً,8�\r�Ve�L�J�����Fb\"�00�<�,���&���G1g0.�4�`��Z^�B�\r�δm��\"�v���\r�7�U\nPJ�B0#CPn�D\$�A�j%ej僌��:IK��\n�|��4^ �\ro�D�n��7kD0b,��at\\B�,\0��0����B�f,\\8��؃^�Pp��D^��lф7�\"�31*�Ê.	`�6��3,H.�΁FL:cJ�e�3/��1N.qR8m���\r��g����Qf8N��@�1eB��-���	���ox&�СZ���i��\"�����8KΡ�	�c���U,��V�\"V��\nTC�ӄ,�\"\0�I�t%\$�og�8��8bā�  �! ";
            break;
        case "ro":
            $h = "Ed&N����e1�Nc�P�\\33`�q�@a6�N�H؁��7؈3��� 3`&�)��l��bRӴ�\\\n#J�2�t��a<c&!� ��2|܃��er��,e��Β9���l�F�9��a�0�����z��&FC	�eV�M�A��b2��q`(�B��8#9�q_7��I�%��fNF���a������%���59��j��!U�ܨi8f��,��i�g�qC�rH\n\"]d��s`d&\r0}t�Lr0���pV��m�hE#+!6e0���Sy��t����qOfe���sIo�귣K~�@P��+�H���+���	+�䑰�x��&C�Z���*�\n?l��P���6���:�L��&�� Ҕ�D@���(�/��aF����)x�4���\r�x�\n������(�\r���R�F�\r/��J�)�/C�2�#:��F��\nƽ.O���ː�%�;��0��/K+ܓ���86����/Lp������Pc��\n\"`@8��h�PC�4ϣ�К�\\�1��@��V�mA���!�����U��Af���v��������`�2�#h�?#�8Hw:�3T��&h�-˅{�V%�z��j\r��!�b�����\\<9̈�1@Ap@�>\nһ%~�L�V�h��t*n��K��>(�J�C����+݉�n뜗�y.f�6#��鮡do\"R(6B�(�ݳrn���x��N�\"C\n,8Acb��ʝ����0����c��-��2a��N4 �0z\r��8Ax^;��r��C��\\��|=�RP�\$7��xE!�Lh齋��D5�A��80Or��|�a�:\r�	�86�CL�Ei���rIc����4�����6_��%�;9/�HP��=�֧�\n2�#�L��v�g�4J�\"�.�0�l�R�0�-M�B�#Vp(	☨��9\$�����X�Q�2�Ђ�ȇMrk\$Y�8h��5����΋� ei���jjx\n)8b�]!�Kd��p@�)(d���p��\r�m��GnJ��&aȚ����Q�.PH�bЬ\n�O-��j�&��J�  'l9�SLj�A�E_��H��z�HQJ	.�(|���,�2������y���	\0KY��u���BҮ�^�'\n\" ���K1�.��0��,Z��I|�v7����S#�O!Q\" tNٍ?K@�5���4������G��|d�!�P�n��HtAƽ*K:�0�\r���|�Y%�4�D<qN����}�V���Y�u��J�e�iB1�K�y��-�Mh��i A�Y,!��BЅ%;�G��@���F�\0�+��^H�M��D��D��1Ǒ���*�j�2\n�\n!䔖�XT��S4˓\\�\r�`��MC��6Y��L��X�<ܞu�T��CH=8&.���֔^��9,P�69�c�ҋZ�t2�I�s2mM�d6Ee~I�3�F:���ܲ��j��\"Ĕ10b�UD5-��O*`��%��UHr3%)�V��l5��N��+��W\0M�UVQ��b�b�����gz^e�t�-\0�*]I�a�VJ�'���R��!�̋mi`�/!�>t�u��R'd�#\\�FIP�Q'V\"?@e&IkK��'����͍~;��ϣ`�@�	 &2��c�i8�wP���ba�J6U�߸�J�by��3̹*V��E���l���}Q�|�Ƒ�^+Xf/F��Rk�8Z4a����|}Ķ��t#�%,*����x�A�3'1����௙B�ȅ��25g�B�OYG2�̓ѵebwd�e%�s	��k�\nR2c�b�g�1M��\nsJE&�6��Mo���x����]�R�0'\"o�j����L�\rrJ���L��Bm\r\"�,�dɕΨ4��u�}\$X3>�W5�y�7�R�_;e;H���)@ܣ�@)f��JE���lù�,�ג�|nz]}���lP��g�=��3����g@\$%���X�GaM�=w��:�0�9y�w&���P ����|���!j�Y�������ټ��(	�;��o���c�e��\n��\nXȾ���gTZ��1�I�-��2LNAQy��V��.BKyOϧ�?Ҵ:�[S)ed����g#O�M26\0eh\\�4\\�Vj�7�䖖a�(��/TЬ_y����-��gnry���^Y����~֪-��R�zL�	?�r󺣤yvw^��x������̈�wn�w+��E�=�)�ɿ��H����k��R~0�D���=WA��Х�A��N��nTXS�Q&7~�By�5�	�`�Y��;�����<Y��H�zB�����;�s=��}j2��;q\r���~�\$������o�����ɗu��\nB�L��!�o��-��o�C��\0/��ȳ\0���7\0�N:�/�F�p \$p���06p:6�V�o���Rۤlт�I����V7<h�q�ʀ�ț�:ÐP6ʜ����[�s�^��W��B�	�l[����x@�7Ƭ8Pv/�.�0�j�5�(�,���PL�M�&��m���.\0B��CfhD\";f�d#ςR�)6L/�dN�H���Q�(ʘ��C��I(-N;��\r�L�P*F�0���0qP�&Q:�.����\r�Vc~`־���d:�4BB,\$��BL5Hv\r��#\0��@\n���ZF\$)���rK`�|(�[�����@��G��'�#4#�����..�3\rL���ș�(L�fb�BR���HK�\"6,Fpec<*��P8bn@��,�%�? ��B��*(�8:�|=#</��!B�H�ҝ�\rN&��=#�F�|f�H��c�vy%.3��%�P�@ǂj-��`�w!c���l��d9��ʬ8`���8-��e),�z��%�TB*H�իl?F��`@7�\0�����,��+�'�v_iNBB��*H4\n\$!6B��J�l���E%�h�X�F~_o�?p5���NB0���[�pc�/`	\0�@�	�t\n`�";
            break;
        case "ru":
            $h = "�I4Qb�\r��h-Z(KA{���ᙘ@s4��\$h�X4m�E�FyAg�����\nQBKW2)R�A@�apz\0]NKWRi�Ay-]�!�&��	���p�D6}E�j��e>��N�S�h�Js!Q�\n*T�]\$��gr5��9&��Q4):\n1� �K�I�Iзh���IJ�6H�B?!���([�&	����sD5AW�ꋬ�QcCXMe��1v��6Pe��:��C�ռƚi7\n����.,V���Ի����:��,�[�ӵ���7��ˑ��>��2S�jbF_#\$�@�/��T�:�q�G�%t�9�g��BhC�k\n��>P�����&��4'\0��B�@*,\\CC��±΢,��G�O�D�%���Hqi?Jh,�ϹKF�.�+\r�\0�(��P�H:�����ڬ-���I�\\+)N\n&��i��@ ��ʯ@1\$�����Z�?��?)�iAA�U\0���4�?zT�\$-�\"ݠ\n�����}@P!���\0ɴ�H���t��!-cIVmEk[�kӌ�͔��W�\"b�)d2�.	uY��Ri%.̉��L�\\E)TT��K>Kj�1I��۬/òh���6���|0չK��k�ń0��ѵ#�`���6���0��P�(���Z�B�22���\\�E�\0R������b	�͓��²��R�C��fWRά'5R���MgHj�E����͓�C���9-i�R�0�)�`AC	�`�P�\\�%����>�	ӥ��YKW�����r��5\$��6�m��:H�6�#�_o�,�b��#m���^��T��c=��7A�HQh�+�� (+�D��Fj������^ ��^�\$��\\f.��M�Bʉ���usZ��œ?x�xD�]��b��S>�0�rˡ��6xA�\\�`\\R�Z�N�q2�r%1#����v��07)4��p�C�t��øoJ�2���C�e�T@ �f��4@��/����hi\r�,A ��(n����C|:L 0� �C�#�-��D�Hm06Ð�xaŸ9��@oV!�7����hi�6��!�j#t�QV(�.�ߡ�\$�����vIQ�2��h��IΪ�g����rQ��;K��3@@\nx).H=��C�1���4���})sh3����8��lyB��\0�����OH�+Da-���6���\\wSh��fS���Let�b�m�SB@'�0�NI�i�a')�3&J�rsL��c�6&��J��_@LHA��� Λ�KQQ6-\\��rv�z{Z%4����N�\rUrL�L�Cxu<7\0��|/x1������\0�`�F\n�B���bb��q�`��i�a�����1�L��N<�/K�Qe�-�N3I`uپ���V��n�ձ��ʑ�k�=G����aX�\"S̍��2���AX\r<��y`e�\rePĔG��\$�+�SE�E6�@P�NDGY`v�T\\M�������-�-�dO+�ԠU9\r�SB�5�HTB�A�d����DY��b�\$�\$��#�!�f���R���hq��7\$`��\nX'εR�ג�b4P��^&s�k�����ͧ�7�;�U�QIpO�d�J��Ee0�i�o�2]�V<��M@MŴ)��{��Z�ʬ��ef��E)��w��_��t��Qc@K��\$���x&%>i!��M��Eا�ty���i.!�,6���xz�㐉�L+&8P���-���5l���h�J%Y�8\n�d���1\\����2�|�W�'�#A�������_�F1��IP��[����:�bO�M�2�t�=՚�]�{i���,�	^����J+����t�,-�1�@FEna��m64i`*t�,6�9�MHȥd�U�j�]�I�c�Ԝ,u���/��5�U��2l���\$��\\M�K�U\\Z�s��{����@���MF{�/��3�T��\$�Z�貺�����M|��n�.y�����/���G��w���v�1ʝd\r[p*�����,g���~�8(���@K	\r�v�1!���RU3���� �D𷤋(��|m��a�\n��D8���WZ�����4��/ڊ��ά��BIз�Dj��l�~u�q�(=7@���KIz| ĳH��O7�LG|_���LIf�\$���_��A�e���,�rK־���n����3hZ��I�p�����k���P��yX�~�oY�m�ט��t>���I�s;����tZ�����eT8B��Umh�Ǩ��۾I>�#�A@x��m��K�q/�J{�,%�xK�+j�ַ�^����Q\0n���9�^�\"<]��x8@��@h\r?��0ɖ�5�۰L���������\$g,����lN�����������\$\"M.�X�jW�i�-e��bB���m�o�����f�l�R�L�b~��ΜO��0fg\$�m��R��\"X�ibm�Zm�rDP����m�1�3��х.����L�G��D���Db`ͮT�l�~�8�c���;	L�L��Ô��P9%�S�꿂2�F��*��P<���\n�JP��Ņ�~Ε\"A��nj���\0��d�����	{��\r�e��VF^�&���*�Pc��Ko<��62F���oPUEB,0~�P��*���mr�A`{��S�Ы�;|���!#�����l�Ѡ�1�Zǳ����m��]Q!m�L�����D?�@�q��n��N~QM[F��\"�u룵 �� ����2����O �!2fB�\r�/�\"�|\n*^�����\"�m-m�Si��!d,c���������Y;\$�F<g&�F�%�����&�m�5%F�\\�pxRPuC���ng�I\"��R7\"-\r	�r&#�'��<�70J˰��-�p\$��FY,�����2&@p��.���/\rr�L�\n���,��SP��0��1��n����Ll�2p��+\r��D%Η�0S@ؓ2r�n<��4Q���M�l�E �BKp���g3u5L6#i\\���J\n(A#,V\$#���V�Χ.��μd�dcF�/fɦ��u�&+y\$���A����<�3��1.�l�4.L�N��m|Y\$�3�7[1�&{3nR	?���g7��\n�D�7�@�\$)*,P�A�m,@ES\r�8F�ܡC�<�4i��5C�F(%\$�\\δL�d�EB�F��F�G+�tmQES[�\\̓���h��=G�?b�D��E!wE�t�:toD��~It%T�P�E�rsa2��&97�?�?t�KQOC���\r(!r=4����mO��I1�r�\0)��#��NS\0��\$.���R�jA��5&A7�j���sJ���3���ST��I�50c�T�T�=2��.AK j\"\\�Ш�%>LU�������6��o�:��1�Ӿ=�`�m�:�2/A@��-�Y��Z\r�t�][��Ӆ1\$2����T�B��������U�Ԛ��汧[	�P��,�b�D/�e`��π�b�g\0\r�V���B�J��,��>g{��W�t5�`��(����\r�� @Hң��\n���prhĆ@�NF�j��W��-��U�I��\\oq�V6�vf�&Sif�^!^��v�U*��+�*#��'�)�:��E(ѓ\0ְU�SJ�A��@,��#��V:@�^��9��N*HLH0D�mm9�gK�A\"�{G�*�P��J�!��B\0�� �g�sjD\r�\$a��a&�=\r\"A�u,�P����%1Լ�'ʴʖ��@{1��ly�qKpL鞮or4�u��weǁMUx\0���ʋ����fHr\0�\0�\0�H5�sy��w�3����Z�t}#xD���D\$�XA]��贗�PԒ\rD�d^!����[�ДW\"���Y�Z��eh��I�J1�x^�&z+XOrGs��ը�����L�S�RnP��^����X��r�Odɐ�x��7t�KԆ��J�xKt�	�r�nE+��0�8��\0�t���E�B";
            break;
        case "sk":
            $h = "N0��FP�%���(��]��(a�@n2�\r�C	��l7��&�����������P�\r�h���l2������5��rxdB\$r:�\rFQ\0��B���18���-9���I��0=#\0����i�LALU��b�&#���y��D�	��k�&),�P9P�j�l�e9)��\$� ���f��k���4j�\\�Y��e%V*�v0��3[\rR :N�S�9� �\$µ��1�iH�'��̠��`r����b9��m2�#�2�\nfm��5���������_��/�D�/��6+���H�6&�Ңn�96Cn�@�AB9�,��8	1J�3�7������:�c� �B��7D�44'�|cƫ���P��'h�@֍n���P��,���\0Ă�L�+K̵*��P��Cc�:�è�5�pЂ3�C(ΘM�P��|�5���ޟ����3�\$NJ�8,bb\\4��!�]I�\$<Lc� ͋p4��cp��`�0��p�&F��[\$�K �#�0�#��<e���|�H\"�A����,f�ض9R6�\"������P��P��&�18bHڍ2 P�<\\���2@�MeV���\"U~�H6���C��g�c�8V��0��HH˄:'E�p7�i�@!�b��X�����3\"v�,�W�`��wl/����1�:B;F�*�5����\r�uZ2�i�ohAH��<���n�����g���.YV°K\$�լSd����Sc�k;��M�b �+�S��\"���9�蜪��L�2c�,��0z\r��8Ax^;�r�6��\\���zs�S	Π�U�3�<8�18SXD\\C�q���^0��@��B7���\"R� 6�	�蔭�r�1#�R��1��'3�R�2QC��\ro��l��rlXm�� ^y[�a\0P�)H����[�i�w�����Y���ԛ����`-a�/QK[+�xƔ�Rb[E\$���SnxS\n��@�f�X�\$EDY���B�tEE1� �V��=Ř:�W��~3�V�#BJB��\n��=�@[�F,��)��A�)�\"�*���.]/�ccP�r�\$9��B���_ka��~� c������(V�MCh�^�%���Z�C예\"	�	�d����3��!�h��䦂��E�Ѓ�lt��P	y澧��Jq�#̩0آPe4�	ቓ(u�bV��Uh*2�P\r����e���#	u͝�/�^Io|�2rRèd�e05�� �\0S�1�a�0��\0U\n �@����D�0\"�d�X��L8*y��(v\$������n���(	)?�掦êc\$�'```z�#s�CU�n@PK;��� �G\n ��U�K#����DwIƛ:p���\r��HAJ|��:���\$��C\n���<�w3P�h��X2����'��^TtL�c�!���S\\.�U#���#yY��u�ü7��d��t��e�DԈV��8)�Bq��o:H�]Wd�G	Y\r'H���O������\0�`ȳ4{�=4�7�_y�(��)�PT�U����t���䶁իǦ����MJ��lp\\mҰ����\\m7JLz\r7���n��d�=>���]o��5��d�����S`,��<��6�j�V\0�������/��TX\$�j���~q�_����}/\0'�<L����!2J�)SF\0�-٘�C���]ꔸ��)M�(�T)�;0F(���2�R�80uX�Ɠ�qS����h�|��\na�:٤��٧E��񡳕��:O\$�I�dRxJ	�W	%+{R^!-0^��\\�p��Zj��D�皘�)��ԫ��(IHVW\n\$��ДJb�kt�:@��Ҿ.!�ӯbpj�Y�\n���F!�kb(�Ј%(V2NԑD�k:eM	�Ge�&Թ��#����fhrS���F��r@�1�N�1�'cY嘇���H!:�3M�]���f���\"�`�#A�Ү�Ca�۔!���P�����x�M��z��\n���\n�Ѡb�8Uݻ(�I4>�e�@��Ï�4��I�6?Fo��q�?���ڙ��G~A������k��\\�W���!�e�\r�3֦��Jӟ�PE��F)G7cd�-�\$�H��\\\n(n+��7&�_9)yM�E��t�RL:�{�m����)��b��������ow2�0#��,98'm���F�{�d�����V��\\�~V����7C\"o�U���!�\"ʹ��A��ʲ��I�LͫW�����ɚU���9OO�?�h�����\nZ9#�E_Z�a�\r�!�~���LVuQ(�3����#kb���{k�ȱ+1�����RSZ�~*�#�⨸��a���xo4}���f���(B��/����\n�1>�/\"��\0�-�����Lj(���\r\0Dk�20�f��bb\nRg�<� �\$�|D!z�%�D g��'O* jD6\"�.��nv�\r����ЍNCL���j��S�\"���DaB�\nD�M��)���+*�e�\$�2�Ol=��'�4��獉�K\r��N�����3��a	,��\$jC�'0�����H.\n���-�7O�O6�c���\rp��\n A�̮�!N6��# �����/3�\0�P�P��2G�Z>C|9�\r�̴#\\�cd�G�0XC�0|?1T�O�Eb�V�N���R�#3��|@c�`@E�p��J�,?���30r���`��l+��'�Kq֓\0�% �\$LI��:@�(#�\n�����W#>��B3�\\%�@Л��\r�V\rf:\rdhkk�H�9B�j�Z\"g�Xäkq4�@�#�h�f� ��Z�3B6-\0��%D�K�+�+��(�\"�����)B@x�(���r����Í�_�#\r�#�>���`��{L�]��F���ق�2D�\$*L��\0#Q��/������\np�Mc�#C��&@�\r��(1D�+r�Z� ��3\n{+��#t����S4�\\��ܣ0�3M��m�,����R����p�0-��bp��'��*�|\r�����\0�ꘀ\rL�x0O�/�.Bx���N�С� �\"�T�(;;�����r��L`\nKh7��&m�Ϥ�[s�x�;=��3#Ľ�`0ŷ-0C3��,I|N3H�*�\$'*��,ܦ�t�W5���S��B�R\n�U8�#���	\0t	��@�\n`";
            break;
        case "sl":
            $h = "S:D��ib#L&�H�%���(�6�����l7�WƓ��@d0�\r�Y�]0���XI�� ��\r&�y��'��̲��%9���J�nn��S鉆_0����Th�g4Ǎ�i1��b2�%�\0Q(�z����՜�\n(���h�@u�����g��̒|T�xvR)t�&�f�K�wS1��5�M'�A;M�U0�u�XD�T�i��V	�\n&�d[�9��m2�P��N�6��f���\n�p���]�g�h\r���9�7U�e��6��<�L�=9{�'ma\$��?(:%���5�)L=��1+���0�2�3��(��BnB,�C�'\r�&29��&c\"�*��rŌI�����l0��Ԓǡkı[�2� P�:��X������9�SQ��J�5�Òx�;�J��C�\rCz�	��H��x�>�b�֌��ܣIC��6D<2�hZ�A\0�(���ȃ�C���9��+!+0�-�N��*���N�.���&���//��1�¨�7�1eh���#��u�Bޤ��g@�J�T�T�cq\0.�c������D=�!�b���BP��RH����?7�>�0�[:%�s������2�����;�\0��ת0@��RH�8�x�5�2��O)��%�]���h���XJ���?MJ������?u`����9 m��;�LX�<4���&���3��:��t�㾔L9����ڠ���Ø�7��xE@�C;����W&�A�6��<:�x�2#��U���*\"H��j�^\r�D���*V���Q�J41�D	�ɸ�\$\n\0P�(킛�wߒ&)�j�3�CT��=*��r��bh-z�0�=��kX��!Q��9�(*r��|��_��)����Ol�m�=rAr�x@���*iⰈ�Z<�ꗋ#x�P�r����?ǃ�U1� F���`��HY�/�����^��Dͨ-L���%��� �x��vN�����zS��\0�#ƪ���\$p��aò#fp���HO�Y\$l�A�u?\r�8�n�\\۝)���n���t�1L'�2f��PZA�J'��Y�JQ?a�܅5N࠱i>�d�BM��%�P:� @�uK@(��H�y�:�䡳'��S*G�9�) ���*\r��B����L)0@(*3Z����	����Jv!��O,x�<E�!�>Uf!��@PK8���t�GM���2����Zaa�g�)�I�IcW\$�Ju���w�����+\r�����t��a���^�eg5�\rS�t�1�xj���éXj���1�	{��xp.7�t�g��H��Ÿt�Y�2J\\ĥ��\r�aa�����a&0p���S2'�\"�ƌ��r�* ǂJ��-B�ᖤ�4\rOP�5c�	z�u�x�d5e���fĊ9��ʼ�\0��Vj��(�\n���BǪ�[\"�m٫��dkJU�V`�Z���ڷW\0�k�]C��4sPj.����:�[�ŇCV&�!W(��}cqؿ���M�C�.V��X��\r����� �ʨ,�*�|��bI�yt��ۋ\nx����)A��mKE}�ֶ�0+{llq��WA�P	Q,+��՘��x\nk�`��)���ٚ}l 1L�s7�:	\$dRX�f�y�L�_l��)N��m9%B��w�SW�K�k�W�+D��%��Qq?#匼��Sz�\\�!o'��]\$YR�����zó��`(+_0�_�h?d\nZ�R�[v%O�� ���C\$�7M�M7O#�#Ģ@�%H,�:�\\��ce�K1�NȪ��?8�E�`P����`�p�f/�I�oZ�����-�!i+�cD����0A�v���Ε\$��O#��N�<�Y��^g\\�W�\"ΐ��h���bMN�=6eH)&��ǣ��\\\$a��=!3ʰ�^�=�hSׯ���a�C�%2��E�Λ*F����&w�\n�أ\r���!4���t�o\\cP��/p�W6��5�B���Y��R+z�=�+�����M��8�����g��a�m��VK����ķ���Z����^j{��G����s�n�T\n@r��uo3���M�a�5�#S��\$�§5�el��DS����y�`��̹U\$�1��)�2��v�*s��(l��T&�m��AC2H0�1���u�y�\n�=���9T�\n���M��\r8[���}��_�'��[3j�=��/��R��l!�J^��|�t7������K>M�DP�^��ԯ�a4�K&\r�8���g3�Hk~a�I�ZK�|��~���/I������Sp�Y<	0fI�8���[�����������G!�:�0�>IC�\rd�7(_�w��fX}Cz�������M�ʄ:S��\0HV�C��o�+�J��)H�R������oX�� 'k�1I��ﬆ�;���N��G/�/����p@�-��j���6�N�60C;F���4;��/�ü����oT�,&'�\\R��[�L�\$�t�p��Uc��+|!N�#����y\0�P��.&�/Hn���6�8�0ֆ��lʳ�Ԇ�nD�^�Ƹ���\no�L�G0�6�ծN�lj^\0��X`�DbE*�M�R��Z\$��L�\r1�dNE1�C�\r�V�K�>�z�i\\}��b)�%���F�D� Cd\n���Z�\\\r��3Ef�Q*�Konb����\n���d��0\"���k�L���E�냬<��]���#��d\nN����0�0j��)xb��gܱB��D@�mJ���օ(�\$�OcX	����R\$F G,5�`P\r&��H�h�B(]�b{HJ��D�\$:o��%�U\$k�'�rpl�%rH�n1&�2n̄&q�q��\$��U`�&�F6D.�B�	\$�a��@�<<n�5`���\"��t'�}*'+G�+�����qG0��L-�H���,Cq@	�M��L�J���+R;L\rG��lJ��>2���0�#r\\ݪO.��b7��0�#�hi ҂b";
            break;
        case "sr":
            $h = "�J4����4P-Ak	@��6�\r��h/`��P�\\33`���h���E����C��\\f�LJⰦ��e_���D�eh��RƂ���hQ�	��jQ����*�1a1�CV�9��%9��P	u6cc�U�P���/�A�k��\n�6_I&��N�~]�3%�&�h,k+\n�H��D�RIVow����>y�g�����	�4%�����U����B� �Z�5�Ŋ�W��i0I��A0��-y��#��損m֝G\\b��	'hi��E��Ƽ�IS%�����#X�s�h�HI�Js��N��X\$�S����4�����9(�8�0��h�Jj�>&���**4��삠������@F�?',�����*�{/��H���.��ѓ���\$n�8��ݢ�C���*�o�Z�I��N����+����]�悈�m܊�����/3	�\$=*�B��#% !�M	C(��aEP�U���̓7:�!H�Ef���г|�/����J1�����2L*��L�mROÊA\$��K� ٧	ڕT�q�l����(�@1T��>�xH&t�A�Ϫ0���jR��4\n|�A	�GIS{�)�\"cP�>\r���&*�2�+�;��U�L�:����%��E����hK0��%%r�5v�1�&E��Tc*]\$�����a(P�)�\$��)�<�:?)!<�At�l�/�j�2?j�	tM�,�E�+o��@ǌ-/%�#`�9(i�w+9Pp@!�b��w��r	)��>\0���P����*��(�|�3o��k[F�I��\"����%���>�	���R\"լ�]v���r���˂NX�d�&��窒֢,z����nN�L��0�c��9�p9��x�B����4�C(ɱ�@4y#0z\r��8Ax^;��p�2\r�H�݅����w�<wCp�4��PD��3����/�C`��X\"�\$6�\0�Ck����|p� �!�4�\n|!�2�\0��\r���X�j2h�=#�SA~6����X�@\$�\n�A�X��;\$� ��-m�����mb!^+UǴ�Nv1�'�=⨷	�:;�ES6#�i1�!1!��&J�\nR?�\$ҖBxS\n�������hI�A�-�\\MY}Df����k��0�����L+��*|��S��;�& �è o�X�� y��4�p@�pf\r0`��0T���B��\n��9��H��v|�T��d�Ί:Bh�zD�Ï	��%1�o�X∑P((��!jZ��SvH4D�Q��<����=�D݈+`��c|��0S�9�F��#!9(EGr, H�+(�\"���i>�M�Hy�RN&3�͖��Q�;��и��AK���'��f�I�!���U'�y�R�'ZO���D�ySZd��q�O�o8!A	�L���Y�a�\$쭺�BIg�@_����P�*P@\n&��%�jvL��A%B����(L�ֻוdf��YC��o�F�����(�˗�\n,�)�/�����aE��Y��\$99	 �'d���\"(��JLcN(�����=����d�gT\r1�h�D.O\"2v	�\\P�?\n�f3��x5�S\n,�l�[�����iG����dyr/\"5H7J*VvL�i�V�֣��I17+��VvMJ�ywX�aj�2,!�iۥEm?`u���&XA��r�<P�[���g��%ĐP[3�p:�.L��FK��~���&CS;:xm����]��uB�%!V�*�Qi��2�|k��:��պ	T�F[��)�̲�\\nWkp\0�ŕ�fg�d��c���b#9�&�',B�i&����G��r'x�.�yӞb~|�Řg\$˚�A>�f�Eb5~Z.��.V�⅔�Fp�1GE��숵�*��Th��3�����<j5e2z�t�k-gB��u�N�f����W�o�L̹�ΰ�Ί\"7�gң�}k䢋���c���=DS\"��J�-5��m|meh��r�\$��%��ZyKia��HL@Xō3/������.	�L2�FC� 3�K\\��!(�h7��]�RL�`2�S��x���\"����;��ݖ��,����)�Hh3H�2�i���A1+C�d.����Ӄ��5|��xIIB���݄�s�E�u	Q\"��;)��~�`WagR\n�w����,��(��Ͼ.�?��W1�客xkݥ��2�+˕�\"��S��M��{�2�*1\$���l� �Q�7]I���k�xI����T�+�]��&��h�}q�\nG2;0�����Cl�����B�f�� tZ_ц7���r|��'��1�}����_��NJ����~��/����/�*0yV\$3�(��E�I�F���c���ޢ�-j�^/ �L�a�/����P,���N�lvnT�D�\"�Y�@8��\r,F+��mf��<�FՐJ;���D����0����0D�H��QJ�7�Z�P`�\r4�P*��Ȭ�/����吢5���*�0�gL�P���\"����/�>J�^*��\\+�.�F��\nV'�e(c��t,r�\$���c��U����Y�xs**�\r��Y��2h�W-�W�l-�X�JV�!0�\\ʺ��>����f���>㫀����4������^�/��o]d��\"���F�7���uo.��>����+�h��\0��&�C��1��z�q~͑�0Ѿ��_����Md��,e�:�Х1����E�7�8��,j�\$���0Y��qd��E�q,Y�].�o�!�L?�0\"�q0�&����#��8Z�^���D���w�S\0=H�;\$�\"�O&�j�%��%�r��������iщ\n�(�FՆ�&Q�ґ\"��P�\$&\0�FZ����;���{)1��;��/%\rrU+2�����O���\"\"L7,�%Ff�N�\"��/���p'R�aQ�6��rb/�b�/��\$�l_���H���R��#h:er��;07\n�3�50���H��&e�?�[\"�Q�h���fdb*@ɒXZ��H�Cc��'��_ g�Z��9/1'ӘՓ��\08M��1�KM���es�8�+J���o�%�<�t��}=H�������	s�	��@�j`�k�5q\\�,\n���!%J b��v����r\0ă�Į\0��Z\0@} Ƃ���Oq�:�6k��,�9����u�\n̬\nҴL�����2���6l���4�@M����7de@��:�'h���g\0��.��@�q�NA2>G���~�d������gH��&��H@S�DC��Ƅ�a>Q.��X��x@�.o��O*��)%���P�9�g�aO�����4MR+�Rs/�NP-�f.�2���F\0��KB� �-�h\\�Z�n�i�D)H��=+T�2-U��YKW���zG�L�c\$h��O�ŔffŨ*���,��8\"F(`b,�ET�*6S0�Oc����*h���4�Gd��\0u�M�[�:q�r���Q�΅�>gu�+�N�cdL�My@�\$��";
            break;
        case "ta":
            $h = "�W* �i��F�\\Hd_�����+�BQp�� 9���t\\U�����@�W��(<�\\��@1	|�@(:�\r��	�S.WA��ht�]�R&����\\�����I`�D�J�\$��:��TϠX��`�*���rj1k�,�Յz@%9���5|�Ud�ߠj䦸�����ɾ&{,��M���S_�Rj����^��8<�Z�+���e~`��- u�L��T�����&����R��	M��HI@�b�ҷ�����2x:M�3I��G�oe[���a���\\�JQ��a�r�^)\\�jr����qȮP\"���%r*W@h���)�����\0�\n��5��6�8��ځ�r��61aˑ�B��J�`F��XF��P)����7��Ɩ J��hf�4�J��КR�G������8�7��,��+�J#(��|�K*J�\\)��{\nG������2����2�,+2~)����D��R�A�|\"�O��F+��㯨*�ʍ\"��P#Q�����ϫt�+��@���%ǰt4�մ�]W�2��E�\\����ԵS5�C��Jϣ�O)jmX�@�a];@������s�]���Д�Į+��s�f��\$X���-�:Ԩ�C`�'{)�̏b����=P��p=v�wj9scG_u����l��(�Ȥ%v����6�-=�eB&9h)�#������:����q-g�9�P ��8�2��~�O�~Y���]A�(��/;�^e�����x�\\�'p&�+���_\\��R�����s�M)qFd��9ń�����6��1\r�*@1�#p)�\"b��[V�#ϴ��h�I��~�G7x��v�]��}[�>�W�fzt�}�vk�Wo����I\ny����,0��L���	��k�\\���>.�Uv/u]�z�u����ȼ��~o/t��K��aN;D/Bm�e\nI�\r��:��L�tpH�\"e���'aOhй�P�Mj�\\O1_<����}i�f����{�e�;s.��j�f���r�bAA)� �R\r9�za68ll�۰@���%������3]�A�Z�[�k�Ɉ����|2��ʥ�`��A�1\n�����\r\\�Q�0Sdb8�R\r��Btj��Sh�10�k�\\�N0:#)�!�F'	�E�,o\\�_�Խ�\$KE\$*ȶ2�\$�Uб7�'�}��K�M���|ݛR�U-��D���haOj\$	�üda�<\0���\$L������\"\r�:\0t�xw�@���Ԇ�At��N��x�!���Ć��4��1Ȇ�D�	B3G�:�^A�`�2�@��t\r�00��C��Q!���H�[�agh�0�3^+��h%�����f\0PP	@�G����J�d��t|`)d�6&�}E�\$��<Cf-��)�Iq����s�!��#k���JcY��SUqU���n��䡎�8�H����ʄ� ��W�z���qTQ�萔⼈�\"��\0�)����F�O\naR�:u�Ŭ5�z�\\��gs*R�F.�'Xs�ܘ.�=;�G�f@c<��4�p��s@�g�V|T],�O!|Z%�W��o����@PJEP1[P@���q��;����4r,�4�((� ��2�Ñ���e��n�[�ɖQɸ�%Nl���T�^ʛ檛\\#�RA�GS�W-�`8�fS�Uα5*w\r+|G9������!���O�ڔX�x�5�B_*���m\nVvXJmX�6��8�y-b_bx\n���8�����\n��e#`KQ����(����^��P�5�Pg\r\0��SJI<-рM5�\"�H��.r~re_U���-���?C�:Ik�V��t�Վ\rư��B�����0V	��^���w���1�\n�\0\r��0����c\rh0���~�9J\\U��>��\".����4D㡍�6�RH��P�*]��� E	�j��˯��؏&:��Jح��Xh��>_�@P������H�jVn�\rΫثb�&қ �}Dv\n�+�=�5��ܣK_@\n�S��*	�D�!�:Û�R\"���QL�\\��^ۑ����\\����p�/�l�����FXYJE(��UU��V�d����o�;�#�a�O6xR���b�R���S~�U&)\\�H�\$���3\n:�z�n�;�a�{8x�Y�=\"` ��)=��q|��o)���>��!� J������%���c��)�o�Pk�s�\"�eUsJ�K�iw���c��ڵ:X�� h������2ƹ9�*�(�hG )_BiQ��)\$<�SU�QO�m��l�U��ŌJ�#���G�M��v��o1�kp���JURdHW�k�Pʱ^��X��@���q�p�8�.򾐾l �\n��a�����Gx�oT&��,��50���J�O�b���ħ��� �p\$��\0�R��K�6�����\0,p.�\r���&�j�z�/%�h�th�0�����O�&�������(M�/4c���\r	p0�G��,D��:cPt�0�R(0��x�^���~��(ϑ\rNP}-��p���X��(P�-?%���IN���-�)R��:ǉR��SLHKŀ�j��P�+\n��Ȕ�ʩ1��P��z����oH��{�#��M�JId�#����Lk\rg�Ǎwnf��Z��L\0���4�g����HX��Y�T�7������,�N��pC�d�#\"����P��@�P����H/���`_g�	\$�����1�\n���&ć��8d+��`�%\0ܢ`�HK�q��j\$�����q�\r24qg�F�D&��'T����c�9�>>����8��nZQRZ�T-�� �\\���ѐ�\nl6\\NE!N~�Ȫ�NS(�����2���ꐰ22��*e�w� ��+�_Rȓ�?�ƋC��,��ѯ�_�8oQ`2O���+1�.�Y��	�>N&�ϛ(O�⤽'�	\"��j� �R�1M�-�k�<�y��4.�-�ivO�����o\0���\\�3*2xSFBP�I0C5 �\0� ���pM��-G4�~��F��n�7	�\\���9Q�����s��O:��33J�G5�u,O�61�;�[6��{3�/���*��=R�.LS=ϦťTF��,�5��.���s�����`�R�-����:��wR� t	=2�=�%04(|-AA��/S�q�se�v�<��3D2��C4Q=h�_E��Q�?N��%4Hʇ�-��1x>��n!�����2�e��V�Z�p*��N���xQ7:��F�f#bUT�\0�Q6�TسN�0]�.g�JΓL\\�0ҕ����T/LTi �T����*ާUF0���@�8�u�4ڬQ�>�1H��/ӷF���m).����܏ċ3�4��N����1Bz'�OPr�{TK��\r\0�<@��F�`�*Xf0�T�y紆p����.K�\n��.��L���pR����Z��|�L��4��3��	R�D�< QX��7��\n\0���SG��Y�QY�3ZOK	QP�d�T���,�Vw�T�Q�`�S��5J��B��eH�tF�����vTOP��c�:�C*�MQ�P�QQ�UR�IS1�S�OEf9d�8�4v��1,f�Z����Q`܀�c�KV�f�O�@������Qij	5�d�]E6N诔S�b ֕i��>G�hP�LvM?V�P�k/9kv�k��6�j��S�b��i�Yf�!/�=��nX��tO�R/��Gfq��,��lL�O��s����V�	't�S���.�PU5 ��f)Kh�W=NG<�m;V�u4�vϏm�;m�[>�7F�vg����\$�Tpj\\x��cof;y+~<�Em�Kb/�g4+�--w�҇=�n`��0��]/�zT-:֡l4m\r�UN�|7�h7��W�?5#b��u��Fw_@�_w��4Azr�w��zXw�|V�Dw|��7@P3����[~w�R=8�9�Ӆ{w���v�g-o�MB��Rlnߘp��{Ü���?�w�C>�7G�`]��v��6�	k�u��5���c��`��Qr��Kt�o����jx��׫������T���{q�zZl�Gj�k,�AWB�t���s�%�X���p�������\$RY��_�y�Θ�uY�T�xㅸlR�		��`�GA_v�AG�t%���f'K��6���J�G�O��}j_���6�s�Ŵ�S��N������̌lq,E�X�9�\r2!P��kQ�<ӄ������}�Z8���|�/�xQא�Qy����J�[+9��tGQ���q���3�3�ҌA�(d�\r�Vm\\`����X\r��\$\n&\r� \r �+����һ`�ˊ2J.���\n���p��\$�+�s�v�1��[kJ�v�{�o���г�x��Xdҙ�v��z�B����r�@�ь�gqQ	��pp�q��K���v&W�=J�2p�W��\r�r<̺��6{Zs��(X�e\"\0�oVTN�/J��a���ړ�m	���0����@�d���k����f�71HGpwn�����C+s���d\rA�:�g8jFxr�(ҵg�����N�������W+�@��\\b�Tf^�[%�\rC��*X��x���qf\0�\$���� q�L<Z 3��\r �X[o��.ڍ\\B�A�d/�M�QW;r���U�Z�'F��x�l�����H��j9���u��D�yP<C����@Ɩ��2�W2�zX�C�q��(I���\$�����\0��Iͼ�T����\"%_\nC���=��,\0��F{#���M�W�\$�9mT\$����!ec�9)n�P�E8�[��MaE\n����\0�n�Vb�1�v�9eA�<�`	\0�@�	�t\n`�";
            break;
        case "tr":
            $h = "E6�M�	�i=�BQp�� 9������ 3����!��i6`'�y�\\\nb,P!�= 2�̑H���o<�N�X�bn���)̅'��b��)��:GX���n�O����T�l&#a�A\$5��)\0(�u6&�Y�@u=\\Γ�\n~d�͍1�q�@k�\\��D�/y:L`��y�Oo����:ц�9Hc࢙��|0��:�I�Ze^M�;a��e�,\rrH(�S̦�a�FL4��:-''\"m�M�Z}��X� ����r�������k\0��h0��:��s2���Ʉ��4�0�9H�L��ύ���2�oQ>:0mZȜ'����B�P��0�2|:F���₉3��b��c\"l��HK<��H)�/،7��Z�\r����\n��O��4�C����H���¼�@P�1p������:�c�\"�2SV6��Ʋ�-H�ٴ���ø���0�@P��#�#ďί3����9\n���E@P�%�T�&;�8:�T;\r9QJ�I���R�Ȱ2R�<b�95B\"45��)�\rqJ���L�N��R]DT�=O<?��81�<�A\0P!�b���P�:H�\\G�ڞ2#\\�9,��䓈C\n����@�W����/�\"|�����:����v���؟_Ϟ�`��>9�2��X\r���32WM֌=*������`9Z�8�6��J�	�v��;����<�2\\a�.4c0z\r��8Ax^;�p�2 #r<\$�8^��c�\"7 �\0^N��n:i��ȹ�a|\$��������^0��\"��|ep ���\r#�@8#͞�72�P���Љc7JCɄ��(a#_?\n4H:��\n-�'�/K&�*�ؓ�ie�� l��-���9ҕHAy���	�H���i>�u6R�/�rO\r�ZlϏ,��(	☨ף�6?ݏ,4���Hj�p^:-v|(�<۠��C9�S���2�PG\n\n`\$�d7���`C�z\r�m� ��z����E�0Tt��30�I\\s��a��<��9�e��ݨ��I��H��fjGL8<p衬���45��	b!5@nJ�Jd9��Ј�؟qj�Z�]X��A���1��� et���ba�v{�����,Cc\$�#\0�jJ��EG�<Rʑ��mSI�\nu�B�&]J8��R�s-DԤe�xya<��P�*U�8eˤ�G�㢺�Bg���\0�\n@T�\"���+e|��q�Z�X0o,��,���N�v8�bk����ܰzL��5�E�ףY�`'��`@C��<&�� ������#�`@I������7�̩�ב7�I`�!+��t�.��#�Gc�zJ]\n�`��T�#���K�0\$�'���5#\0��ٱ̦�Q�SSq�y�(g�����D��VJ�]+ʎ���fg�t�˒m5'�љ�f�M`F���W�|�1D2�#&���Z#����e�_����X�2�I�f�����d� \$)�Tg]ש?U�<�c`��pPr݄�Cv��S�D���(��Z}��t��r!c��������D'c�z��e�;`�-������YcR�#���\\�8K�\r�at��ғ�E�j�x�F'�R:ͅhK%�䳲NΑԬ���p����)����RD�r�VR۟6\\)�	��=SdEE�QE�����|�	n��d^��\\I���R����I�,k�����@�0p#�ؘ?��Y���2)�'�eHHd�yP�n�b`ɂ�iL&���d�gq�p���7\$�a���,\\�M5���#���J����B�\r3�\\�Y���\r��p��t���̄^3Cp��t�ٻ<�ɺv���4(�Q�=H�� �Z��F.g��eu��\"��>f\0A�qQ�3��a�TP�E�\0@rn�Y�yoQD=<�2��1	dj򇪐��:�%�5=�T�\"�?��\$l���.t��-��բ46�O�\0�,�S��F�V�f�ұ6/kd}�'�݁(��pXm�h0�0���MS=A�\$��x��Zl�s�7�*޻�X��I�.&\r)>i\"���dJ��T��6��]+�\0��K�	�p:\\]bkb����1�8�_8�ߕn�K%�F4\r\$5SSIPCqDŲ	¹�\\K�5�:λ�b��8.�@��읁0j�L�U`�oz�y��S�vo9�X���<��cK��]���#f���3�M�ʜ6&��{Va�v`\nG�������r���tSU��iH��'��\$s��8J#��>ʌ�b���x�G})��mX�|���3|�u�����R�ޫ�|5��)�����=�k���>'䰏-�)�]�v�fLY���\\���K�����&f]�쮲�.f*lw��b���zf����\$�L���p��\\�m���\$K^�h>k�� �\"��\\���n��b#T��ڰ��������,\"��CC��{ʢ%�0�`c�\r�V>GLR���H:\\�&� `�\n���pa,,p��Z݉��#�qEh����M\nE\n�y\0�΅��&��@��xE�Z7&j+>Ј����P^���&L�odf���'�RQ��fZ4��w�H\"��0�HV�6\"�~��.���`�/\0\\%��*�dY�#CR�'�/�����0&xH��B�qX��� c�\$\"0�\n�d�%���2ꎆΪun;0�I�p͂JӉP�M*M/Y��L�@�eED�dFH�L#@�A�`�b��`m�*���lN��I��Y��\r��֥J'�.NJ,J��R<\r`�ņh7�Ds�b��\0C�@ �";
            break;
        case "uk":
            $h = "�I4�ɠ�h-`��&�K�BQp�� 9��	�r�h-��-}[��Z����H`R������db��rb�h�d��Z����G��H�����\r�Ms6@Se+ȃE6�J�Td�Jsh\$g�\$�G��f�j>������l�]H_F�M<�h����Ѩ�*�6�J�29��<Oq2��y���,*Q��=����\$�*!`,�b���eqQ�HZe���M�\\e��E3�¯�c���b��hR뽭E%�@�q���/�A�Hx�4��еq��#s�au��ƙ�\\{ �Y���K3E���\$E�4I��=J�G�E\n��oɡ	;�� ��b��OjZ����� �\0�N�l�<,1��2��(�cIÍ:b���)�Q��z�BѪV^��4RBl�@N��G#H\n��+2�k%��h��ƂS/ q�\0�(j�5�h�.�<��ؤ��G'4��K)-��(3�n�K�6�%	����)+�����%e�cJ��\"ɬIxN��̡Q��-C��#-�-��!�,��� hSNMx�V�tƽ�b4�m:��ŬLڼK�Y/R�&��\nJ]D�̜�9H| h=��d�Ҍ��;�s��B0�6\r�\0�0�C`ʌc�\nb��F�ty�7t���IK'!�ԑ?+��)US2����&):�t�B��|\"� ͮB��9#�B�]\r�*Wc��;�*IW&�\r\r�s\\ܖVQ�W�ՑC�E�[���X�ɤ�9�D�4{l��.Z���]a.�c`�91�����0@!�b��u\$C� �尮��2�����,�������-O�H���o/���2�1��	J��.�/\\�����;��S���R!��򴝂6s���j��3�3Q²�c�צ֓�epmJ�7*˯j�����t���(S0{͎d�)���0�c��9��9��x�O���4�C(ɾ�@�f��4@��/����hi\rϬ? ��(n�����C|K�0� �C����D�Hm�6���xa�0CP�z����־�Ht}��6��l�#5/����_�Ҁ\$�&`@@P�M�sn��X(,��8��S�Q�6�Ш��#\n��x	֣�B�k\\��_�D�A\n#�(END����T�(�v��^�P,���A[�ixO9ޚ�T�q�G'��C�ZӚ#o��<���[�M)4��ȾTY��J��r�y��K��/H!���H�yY2��{h.91�κʓf��l��pT��oX����A�\r��:�0���A�3���0i_@�;����P�!�O�d��TI�9��FXv��\r_�&lי��l%�3t�1�Y-e<7%ݙ�x-��5�n��f\$����0�M�Ӧ��3\$��%��N�)���Ukb�y����'Mn�G��u8��`�Q���d���,��Sz��H�6u~��=P�&�ݮ�bA��h\\g^i5�����.&6��fQi\na%�t�7:,\"��+	��`f�DUu�h�yu�j�蒻�c>�`�'2|�����CB�U�0���c@J��r�i1�Jd�sW�,���^�K\\С�hH��*b��.bD�)��Ή]�r�\n����Q=ǃ��Ir�NjQ��oH�j��i1��UaM�	A ��s,qk8h#Z�TVL�c=-�jӵV��	���)z� M1=j�-.�1kUa\rZ�\nj�l�����1И�&����R��G�T�(`F���E�I��S�%+�МwQ.m+[0�e��� ����N��<ե��:��E�\\�q\$RZĳ#�pH�9���Þ����>E|/h�T��:�K�W�0�f�O�=��F?4��G\n��5���0dĩv'L����#�5\n>�g�(�CKg!IDd�Ք+Wh���O�%p�}@��y�'V�]^�T�օC[8�/��כ<�)�R}��Ė(MAk\r���M���Sh�\r{�u.���e�i�C_�6[~��IH6�/���en�]2��{�3�:T��T���\\��x.�U��r��k�8Oֹ�K���\nF\$|l��\"�,�:|Y;�&ʸ�������z^u{6�u;����yC�o1��څy�*d��'%��M�Ϝ�q��R�R�(�V#m׽�zT!,dh�W�]�wnn���B���iL��κziVG��^���w�˓Q�H�����D	g�1���K_�RͭlƎwO\0�h� \r�8 �AW�'k�\"OP�_R�\r�ѯu�l��W�K�?d�s��G\0������Bt���a��1���sI=C��ౘ��([�<^�\$���b�\neQ��x�sk#���5�����ǣOcA*s�A�i&��TEȺ_��ⶴ�\$���R�\\y��c�\0��5	\"�+�u��F��l.�dd��삒���E��/Ȫo � ��i�;�.��6!2�\nZ!k��@R�P @���g���*�����x�F�\\@cʙ6�p�f�c�R�����jJcP{\nI9\n�k��4�bL�ľ�p�gJ��ǥeNd����P�ePFi��CM����i�JRLB�J��B�ex�d��n��ܝG���\\���mv�ؑ�m�dʑ�v/m5\$6(���;P���9�{Io\${q �VK�P�**.'�)�D��Zʍ�?�&��	\r϶�pĳ����������1�!l���;q��A���X��~�#d�g�(��)��.��\$��IL�\$���n��u'�Eo�K�Tu�p��S	���*D\"����nyg��G�2�F:B��g<OѦ�Q�L�Fl��c\0%���派Q2�������\r	0`Ą���&0F�,J����B�2t��O��������e(,N��kr��R��'�*х1�,0�b�Ҕ���,v�o�t��Q0Y)��F���乃fE�̰�t�����~�?#�Lw�Mk��&���VS�Kp�O�(�c�б\"A�����'�,��M�#3�k��r�����hw%�Q3Rb�C3J�4Ƥ,ZV��6��A3\$��+���r�K0�x��������@:H�*��n�.�>��:I]+��4��:�aS����+���&2�;��b�)+/r�Ґ=��<�G>s�1[2r�pJ�����c7)»��>�YL��S�BdU'�_�\$�l�+�7GA/�A�<�����C�<�2�^�EI2���2N�Bь��F��>T5=P�G�_G�.�3�4��aJD�\\�fg�8F�� �z�^��e�p�\n�����hv���SIL�0�L��J��M�MDT��=M�SL���rr>Zf&��%l*�¬ӁJd�4��Q4)QR����3���ýN5)Ԅ�\r�Q�O��m`�rLP�3���R��\n��8�?+Ժ �t\$*'���E�\r��} @H��`�\n���p2h��@��ͬ�f�s�P<h��<O���YG��D&͔��ҳ��Z��Eճ\\�\"Cb@\$Ine-`K�h��.j��+�R�ZD��BR���{[#x7�*ͣV�(ܙ�iAJ�Q�]��cr���5�4��d 	����VD�\0�~E����a4p�Φ�V�ʬΏ����=�0�n�t8��{��Bl�..�g�]g6�`b��nEJ���YhQd;P�GGP��� q.;B@�q��L�䶲�֤���r��G�,�&�{�[_XI�V�P��>����t[����A��Ձ%%Mx����賉 ՅvR��R@B�Ĝ6����βd^����o�VN�g��K,1h�4c	/�;�Fc&qP�s��t+?�n�/9�+;S�=�����\0�[�pwc�{�";
            break;
        case "zh":
            $h = "�^��s�\\�r����|%��:�\$\nr.���2�r/d�Ȼ[8� S�8�r�!T�\\�s���I4�b�r��ЀJs!Kd�u�e�V���D�X�T��NTr}ʧE�VJr%С���B�S�^�t*���ΔT[U�x���_�\\��ۙ�r�R��l�	@FUP���J����u�B�T���dB�α]�S�2UaPK�R�Yr}̗[:R�Jڵ.�V)�+(���M�Q`S�z�s�ӕ�:�\0�r���Uꊶ�K��.u���S�J*g�x�-�(�ڽ�P e��26\n]ni2ԗ��0_��1@���\$seKZX?�rZL�9H]:\$��O�i6Zġrt�3�_D�DT�)Myv]%	r��%:�F9��,tĊ2\r��E%��'\n���.\$�\\H	i N壼��g1���k�\r�q\$r�D|�L��l�H ��0��I*_ͅ2�E�#�`���6�\0�1�#p)�\"a�H���Ig)x���C=�%�/͐	�ԧ1P��s����ua7T��Rs��S?G1:A�\$� ���)\nR�)�řPt���fr֤�aW/�UW��t�\n P�:M�FJ�\0�)�B0@���9F*�IF��yH�)��r���/h�v�I:D�.��Kq:r��,r]�V���^b%~&�0;j�8���~[Pl	�-M��DY�l2ˉ��:��@8gC��7�R@�<H�2��p@!\0ѥ���D4����x﯅��6�#vzh�8^2��X�\rØ�7��0�C8�:j��H�a|\$���6탠x�!�9�@�4\r�@�7�#�F�#�����,K!9	��Ls,k,RW�Pbt\n@�0�Cr�����\n:D��AlB�r`�YI�n�61\\Z����-ϑDO�QAǲ�T��ݠ�)�����*�q��6�I!�)������\$,�/H*�^�\\,����n�����b\r!�)@�0iQ��;�����R) 4�V���A�6��z�:�5�!n���gȢS��.�Ь=@+]l��ַ�h�c�T��xKA[�a��-�0�?O�{CA8+��B,D_�wh�é1N=2�C�������+��4�0얮b��Z\"U[.�]:?|\"�K-D��,xA<'\0� A\n�I�P�B`E�g|K�8� ���4�եD��R�G1�C�5\0���U\"�LaH9D\0�%�I}�Z-�K�#\",�\"0.Qs<E�#�)���Sh���by�K�yժ�T�aмub�c�q6+�0��Ly�(	���i\ngx\$Oiy���~��V�غN��I��ҳ\$��Y�_)�'<VL*B&D��`�a(?h`��h���%�|R��t�֠�H����|(D`楔�'��P	RB?w��^��\$�l�t�%K��Ha���-U�	��N�|:3�-�d{\"��K%|��0S+!\"c\"�s�<Z�r8�dۙ�'0�K��B�d8����-¼���[-OK�=��p��I�\$�F�\0\$���Eq�9��*ls�\$�@*�t��A6�����Y*�P���ﶃ�G���nEq�f6�e,��@a�\0�79���LQ���9x ag� 4����c�T,L��{�T�ȶ:\"���L�o1����[�K2�h�G~��2���g���dVZ-����DRthx�4��LG�\\#�5E��ar��G.�3��\\\r:'!��s�U�H��|B�ᕱ ��8�ı�^Cȏ\r���eu4��,�V����#%M������w!U�G�q����l�r����9S`��c�1�*Pi�k;��d{�/�d���:|笙@���`�'�Q\$#-�����u��<�'D���M[(*b�D�(�Gأ)��ߑU�'U�)��JNCDc����w��W�>�l��Ks����	�ɪ�n\"�i�0-���\$#}�v�͠�*ol-�H\nf{T�`�e���	K1�ۂ�m�uHNb�&�拴D'O@�VB�����\$u�T{[+c�7GsN�E[�4&ݼ��%ˤ�/�1��t�Eq���^�Ҟ\n�6\$��6'���4��B�o&�����9I��ܡ��-���'�;�'rgϹ�;�����\$V)��D=ܟ����6'H��3u.�^k��7�����D|z7_4�ꔋs.�hi���'\$�\r[B~mS3\$r(�k:0ҽ�\n\"�H���X�aBQ�&��z�+�P�Q��������`+a�4�0�����6Uu�k�\r!�<�:�4Q��:��@��\n\n�P#�p`c�A�3�J�P�h�Y+-���8/b\0�-Զ(�T�|P�J*� l!}����P�������W�Y�/!����N��Bp�L�����p�H�&��Q\$x�D\$F:m��\n+\n��z���bX�Z��9m�߬BX\n��� �+����\0��J\r �i�H�\r��`�c�1��Ki�[���L&¥��)`�+�f�d3t8�2�,:De�\$\"��,%�G\nX@��Z�0 -�*�O\"YC4�|����,�����.b6,�i`�d�b�#v@�	\0t	��@�\n`";
            break;
        case "zh-tw":
            $h = "�^��%ӕ\\�r�����|%��u:H�B(\\�4��p�r��neRQ̡D8� S�\n�t*.t�I&�G�N��AʤS�V�:	t%9��Sy:\"<�r�ST�.�����r}ʧE��I'2q�Y���dˡB��K��B�=1@��:R��U��w�Dy�D%��h�<�r�b)��e7�&�p��q��i�U�ʣS��0w�B\n�P�����*����iu-�>�L��)d��Z�s����t�t�4ȅ�]l�t-�����\0���m��M�2�]*��5۝j��/VZ�f��\\,�	�s�^C j�е-�AV��%�\\R�e�pr\$)��`Q�@�1&C�o2.S�9t�2���e��J)!Dtĳ�EQd:�FkY`r�e��P�i>[��b.[�Ax턣 @1,�P9�0�1\r�i^���,M��) D)d�8�,'!v]��!��9zW)dq\$��2��T�� �P�ʎ��J��AL��h�zNB0�6\r�\0�0�C`�c�7B��&��{5�YI�k	�B4ʔi�1����q��-�\$MWG�;[<u�O[@�1<[W�YX���iWª����AU�Dlub-�w[��!Qc,0�3\r�C`�9\"��lD&� @!�b��K\r�[0��Y�C���&^:)��r��sA	�ϙ�D�@)���4�)~הA�Qg)*O���;���!e���F`�>K���ĭ��1\"t�K@&�#�.9��9��x�'2���9� \\�@4k�0z\r��8Ax^;�p�2\r�H�2�Av�3�����3�^R��3����/�4���H�8SCk0:�x�3ØA��@�'�>0�A\0�B���O��rĲ,�4Z%�)�T/q	٬�L�]��Y^s��(	�o��}�jB!�B��iIZ�[5�jN2\"��)�jܜ�qk.��~���dE��(	☨Y!TO�9q��M�&���0�FF���1@�A�&\"����h�o��O���{s\r�1��L�4��@�Kb�P(B0ܓ�K�j��°��j�oټ;\"0F�\\��,��̌@�'���.��:�XB-qĵptE���.Q�+�R]\"�,@a\nXJ@�\" ���&�B�=�<ǜ\$���wN��9պ:D`�(��;��,��(Ts\nBP�j�@��r��~(���]��\$41	(��%,�s7��M?äF�R�%��\n	�8P�T��^@�,�<&(HI��#�]LIę!cbl�j�QIX\\#�:;�Q�4r�D,(�2(T��)�Kg�4��\"�H�e�\\����S4(��5�2ȸ�C�^̊U��T0�A|!�0�\\M��v&Uȹ�H��K)i-�x�ac��Ղ��=*\"�ã�����G �ʴ�غ.���-�+M�y�F]'��.��:�ڗ./K�5�,O�Q�*hZ\"�	02\$T����v�� �ٺMH�<��b:D��x�R�qv)&z�Hr��3\$~�D@�����=�]^����>HE��':˒&Nz�0�e��-3� �(���V�\"Z �x��R#�]E!1�\"�Q|'�!�>���31@ n	���T�Q!�]h�VU2Z�#�l5�eT�t������A��Sq��fV~(�&eC�S<�Þ��J����Ύ�bY~��a�0�@@�0pA�)��( ��0�u,NS\ni�*�b&п���\na�.E��9�y\$��Z�1 ���OQpd��Wp��Q�-������&�s�{�,Ȳo#�|�.e�/k��df3c�hG�#D�6F�/\\��s�%�k�+�Dh�\rby�J�)�2ު�Q\"�S=�[�&�X�#�K\niY�:��N,_cM��n���?H�ȴ���Y4�\n��e�*U����OO.����LW��U�Q#Mz�i������k�e�7��W����-&���'�!k���ƕ�h��\$#/��Ĳ&H\"	p�x7��	\r��\r�Y��3r����٤�k#��Y����T.��R<%(��_)wqn�Ji�<���Z�ͤ[t�!�p5d�۪h���ȷ��<9�.FP�i-Gƨ/��K�q����O�\"�b#QsʓW,��K�U)Y�����|�	c���!ØW���A�S��0rb#O��ğ�Q�<r�hTD����\"�u�����[ip��iR�[�q�Q��|T��t��M��ȫ�ބ�q8�S0�/\\�}��Ցg�������/i0>?�f�9����7�w\$���df\\�S�V}�B���Κ����駨�Ҕ�s�=�Ĵ����G�x��5i\$�z��kD/��������5:�E�K�I���\0��t��P{���àR!�F/H����X��XG�!�{��\\��Gmz�#@e�\r�V`�\r �\r`@d���\r��`>t`���u@�v@���6\r��iĞSf엠��Z(��0\r��vJ�(���F�#B8��6���,X�,�8x/J��K�Ic�dH���<�G�G�)g��c\n�	�B����.k�@.UH�,�|� ��pBB�ȍ\$z)��X<j�fL~o������<c@\n�6c����6@�3\0� �F�vE����f����MZ����C��I��j)����8b,H��\n0�6U���,�k\"�/��R)p�\n����v�l �����!���B���`�.�T�������v8�	\0�@�	�t\n`�";
            break;
    }
    $xg = array();
    foreach (explode("\n", lzw_decompress($h)) as $X)
        $xg[] = (strpos($X, "\t") ? explode("\t", $X) : $X);
    return $xg;
}
if (!$xg)
    $xg = get_translations($ca);
if (extension_loaded('pdo')) {
    class Min_PDO extends PDO
    {
        var $_result, $server_info, $affected_rows, $errno, $error;
        function __construct()
        {
            global $b;
            $Ke = array_search("SQL", $b->operators);
            if ($Ke !== false)
                unset($b->operators[$Ke]);
        }
        function dsn($Ib, $V, $E, $cc = 'auth_error')
        {
            set_exception_handler($cc);
            parent::__construct($Ib, $V, $E);
            restore_exception_handler();
            $this->setAttribute(13, array(
                'Min_PDOStatement'
            ));
            $this->server_info = $this->getAttribute(4);
        }
        function query($G, $Eg = false)
        {
            $H           = parent::query($G);
            $this->error = "";
            if (!$H) {
                list(, $this->errno, $this->error) = $this->errorInfo();
                return false;
            }
            $this->store_result($H);
            return $H;
        }
        function multi_query($G)
        {
            return $this->_result = $this->query($G);
        }
        function store_result($H = null)
        {
            if (!$H) {
                $H = $this->_result;
                if (!$H)
                    return false;
            }
            if ($H->columnCount()) {
                $H->num_rows = $H->rowCount();
                return $H;
            }
            $this->affected_rows = $H->rowCount();
            return true;
        }
        function next_result()
        {
            if (!$this->_result)
                return false;
            $this->_result->_offset = 0;
            return @$this->_result->nextRowset();
        }
        function result($G, $o = 0)
        {
            $H = $this->query($G);
            if (!$H)
                return false;
            $J = $H->fetch();
            return $J[$o];
        }
    }
    class Min_PDOStatement extends PDOStatement
    {
        var $_offset = 0, $num_rows;
        function fetch_assoc()
        {
            return $this->fetch(2);
        }
        function fetch_row()
        {
            return $this->fetch(3);
        }
        function fetch_field()
        {
            $J            = (object) $this->getColumnMeta($this->_offset++);
            $J->orgtable  = $J->table;
            $J->orgname   = $J->name;
            $J->charsetnr = (in_array("blob", (array) $J->flags) ? 63 : 0);
            return $J;
        }
    }
}
$Eb            = array();
$Eb["sqlite"]  = "SQLite 3";
$Eb["sqlite2"] = "SQLite 2";
if (isset($_GET["sqlite"]) || isset($_GET["sqlite2"])) {
    $Ne = array(
        (isset($_GET["sqlite"]) ? "SQLite3" : "SQLite"),
        "PDO_SQLite"
    );
    define("DRIVER", (isset($_GET["sqlite"]) ? "sqlite" : "sqlite2"));
    if (class_exists(isset($_GET["sqlite"]) ? "SQLite3" : "SQLiteDatabase")) {
        if (isset($_GET["sqlite"])) {
            class Min_SQLite
            {
                var $extension = "SQLite3", $server_info, $affected_rows, $errno, $error, $_link;
                function Min_SQLite($pc)
                {
                    $this->_link       = new SQLite3($pc);
                    $Ug                = $this->_link->version();
                    $this->server_info = $Ug["versionString"];
                }
                function query($G)
                {
                    $H           = @$this->_link->query($G);
                    $this->error = "";
                    if (!$H) {
                        $this->errno = $this->_link->lastErrorCode();
                        $this->error = $this->_link->lastErrorMsg();
                        return false;
                    } elseif ($H->numColumns())
                        return new Min_Result($H);
                    $this->affected_rows = $this->_link->changes();
                    return true;
                }
                function quote($O)
                {
                    return (is_utf8($O) ? "'" . $this->_link->escapeString($O) . "'" : "x'" . reset(unpack('H*', $O)) . "'");
                }
                function store_result()
                {
                    return $this->_result;
                }
                function result($G, $o = 0)
                {
                    $H = $this->query($G);
                    if (!is_object($H))
                        return false;
                    $J = $H->_result->fetchArray();
                    return $J[$o];
                }
            }
            class Min_Result
            {
                var $_result, $_offset = 0, $num_rows;
                function Min_Result($H)
                {
                    $this->_result = $H;
                }
                function fetch_assoc()
                {
                    return $this->_result->fetchArray(SQLITE3_ASSOC);
                }
                function fetch_row()
                {
                    return $this->_result->fetchArray(SQLITE3_NUM);
                }
                function fetch_field()
                {
                    $f = $this->_offset++;
                    $T = $this->_result->columnType($f);
                    return (object) array(
                        "name" => $this->_result->columnName($f),
                        "type" => $T,
                        "charsetnr" => ($T == SQLITE3_BLOB ? 63 : 0)
                    );
                }
                function __desctruct()
                {
                    return $this->_result->finalize();
                }
            }
        } else {
            class Min_SQLite
            {
                var $extension = "SQLite", $server_info, $affected_rows, $error, $_link;
                function Min_SQLite($pc)
                {
                    $this->server_info = sqlite_libversion();
                    $this->_link       = new SQLiteDatabase($pc);
                }
                function query($G, $Eg = false)
                {
                    $Od          = ($Eg ? "unbufferedQuery" : "query");
                    $H           = @$this->_link->$Od($G, SQLITE_BOTH, $n);
                    $this->error = "";
                    if (!$H) {
                        $this->error = $n;
                        return false;
                    } elseif ($H === true) {
                        $this->affected_rows = $this->changes();
                        return true;
                    }
                    return new Min_Result($H);
                }
                function quote($O)
                {
                    return "'" . sqlite_escape_string($O) . "'";
                }
                function store_result()
                {
                    return $this->_result;
                }
                function result($G, $o = 0)
                {
                    $H = $this->query($G);
                    if (!is_object($H))
                        return false;
                    $J = $H->_result->fetch();
                    return $J[$o];
                }
            }
            class Min_Result
            {
                var $_result, $_offset = 0, $num_rows;
                function Min_Result($H)
                {
                    $this->_result = $H;
                    if (method_exists($H, 'numRows'))
                        $this->num_rows = $H->numRows();
                }
                function fetch_assoc()
                {
                    $J = $this->_result->fetch(SQLITE_ASSOC);
                    if (!$J)
                        return false;
                    $I = array();
                    foreach ($J as $x => $X)
                        $I[($x[0] == '"' ? idf_unescape($x) : $x)] = $X;
                    return $I;
                }
                function fetch_row()
                {
                    return $this->_result->fetch(SQLITE_NUM);
                }
                function fetch_field()
                {
                    $B  = $this->_result->fieldName($this->_offset++);
                    $He = '(\\[.*]|"(?:[^"]|"")*"|(.+))';
                    if (preg_match("~^($He\\.)?$He\$~", $B, $A)) {
                        $P = ($A[3] != "" ? $A[3] : idf_unescape($A[2]));
                        $B = ($A[5] != "" ? $A[5] : idf_unescape($A[4]));
                    }
                    return (object) array(
                        "name" => $B,
                        "orgname" => $B,
                        "orgtable" => $P
                    );
                }
            }
        }
    } elseif (extension_loaded("pdo_sqlite")) {
        class Min_SQLite extends Min_PDO
        {
            var $extension = "PDO_SQLite";
            function Min_SQLite($pc)
            {
                $this->dsn(DRIVER . ":$pc", "", "");
            }
        }
    }
    if (class_exists("Min_SQLite")) {
        class Min_DB extends Min_SQLite
        {
            function Min_DB()
            {
                $this->Min_SQLite(":memory:");
            }
            function select_db($pc)
            {
                if (is_readable($pc) && $this->query("ATTACH " . $this->quote(ereg("(^[/\\\\]|:)", $pc) ? $pc : dirname($_SERVER["SCRIPT_FILENAME"]) . "/$pc") . " AS a")) {
                    $this->Min_SQLite($pc);
                    return true;
                }
                return false;
            }
            function multi_query($G)
            {
                return $this->_result = $this->query($G);
            }
            function next_result()
            {
                return false;
            }
        }
    }
    function idf_escape($t)
    {
        return '"' . str_replace('"', '""', $t) . '"';
    }
    function table($t)
    {
        return idf_escape($t);
    }
    function connect()
    {
        return new Min_DB;
    }
    function get_databases()
    {
        return array();
    }
    function limit($G, $Z, $y, $C = 0, $Cf = " ")
    {
        return " $G$Z" . ($y !== null ? $Cf . "LIMIT $y" . ($C ? " OFFSET $C" : "") : "");
    }
    function limit1($G, $Z)
    {
        global $i;
        return ($i->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')") ? limit($G, $Z, 1) : " $G$Z");
    }
    function db_collation($m, $Xa)
    {
        global $i;
        return $i->result("PRAGMA encoding");
    }
    function engines()
    {
        return array();
    }
    function logged_user()
    {
        return get_current_user();
    }
    function tables_list()
    {
        return get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name", 1);
    }
    function count_tables($l)
    {
        return array();
    }
    function table_status($B = "")
    {
        global $i;
        $I = array();
        foreach (get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') " . ($B != "" ? "AND name = " . q($B) : "ORDER BY name")) as $J) {
            $J["Oid"]            = 1;
            $J["Auto_increment"] = "";
            $J["Rows"]           = $i->result("SELECT COUNT(*) FROM " . idf_escape($J["Name"]));
            $I[$J["Name"]]       = $J;
        }
        foreach (get_rows("SELECT * FROM sqlite_sequence", null, "") as $J)
            $I[$J["name"]]["Auto_increment"] = $J["seq"];
        return ($B != "" ? $I[$B] : $I);
    }
    function is_view($Q)
    {
        return $Q["Engine"] == "view";
    }
    function fk_support($Q)
    {
        global $i;
        return !$i->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");
    }
    function fields($P)
    {
        $I = array();
        foreach (get_rows("PRAGMA table_info(" . table($P) . ")") as $J) {
            $T             = strtolower($J["type"]);
            $vb            = $J["dflt_value"];
            $I[$J["name"]] = array(
                "field" => $J["name"],
                "type" => (eregi("int", $T) ? "integer" : (eregi("char|clob|text", $T) ? "text" : (eregi("blob", $T) ? "blob" : (eregi("real|floa|doub", $T) ? "real" : "numeric")))),
                "full_type" => $T,
                "default" => (ereg("'(.*)'", $vb, $A) ? str_replace("''", "'", $A[1]) : ($vb == "NULL" ? null : $vb)),
                "null" => !$J["notnull"],
                "auto_increment" => eregi('^integer$', $T) && $J["pk"],
                "privileges" => array(
                    "select" => 1,
                    "insert" => 1,
                    "update" => 1
                ),
                "primary" => $J["pk"]
            );
        }
        return $I;
    }
    function indexes($P, $j = null)
    {
        $I  = array();
        $Qe = array();
        foreach (fields($P) as $o) {
            if ($o["primary"])
                $Qe[] = $o["field"];
        }
        if ($Qe)
            $I[""] = array(
                "type" => "PRIMARY",
                "columns" => $Qe,
                "lengths" => array()
            );
        $Lf = get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = " . q($P));
        foreach (get_rows("PRAGMA index_list(" . table($P) . ")") as $J) {
            $B = $J["name"];
            if (!ereg("^sqlite_", $B)) {
                $I[$B]["type"]    = ($J["unique"] ? "UNIQUE" : "INDEX");
                $I[$B]["lengths"] = array();
                foreach (get_rows("PRAGMA index_info(" . idf_escape($B) . ")") as $vf)
                    $I[$B]["columns"][] = $vf["name"];
                $I[$B]["descs"] = array();
                if (eregi('^CREATE( UNIQUE)? INDEX ' . quotemeta(idf_escape($B) . ' ON ' . idf_escape($P)) . ' \((.*)\)$', $Lf[$B], $jf)) {
                    preg_match_all('/("[^"]*+")+( DESC)?/', $jf[2], $Bd);
                    foreach ($Bd[2] as $X)
                        $I[$B]["descs"][] = ($X ? '1' : null);
                }
            }
        }
        return $I;
    }
    function foreign_keys($P)
    {
        $I = array();
        foreach (get_rows("PRAGMA foreign_key_list(" . table($P) . ")") as $J) {
            $q =& $I[$J["id"]];
            if (!$q)
                $q = $J;
            $q["source"][] = $J["from"];
            $q["target"][] = $J["to"];
        }
        return $I;
    }
    function view($B)
    {
        global $i;
        return array(
            "select" => preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU', '', $i->result("SELECT sql FROM sqlite_master WHERE name = " . q($B)))
        );
    }
    function collations()
    {
        return (isset($_GET["create"]) ? get_vals("PRAGMA collation_list", 1) : array());
    }
    function information_schema($m)
    {
        return false;
    }
    function error()
    {
        global $i;
        return h($i->error);
    }
    function check_sqlite_name($B)
    {
        global $i;
        $jc = "db|sdb|sqlite";
        if (!preg_match("~^[^\\0]*\\.($jc)\$~", $B)) {
            $i->error = lang(11, str_replace("|", ", ", $jc));
            return false;
        }
        return true;
    }
    function create_database($m, $e)
    {
        global $i;
        if (file_exists($m)) {
            $i->error = lang(12);
            return false;
        }
        if (!check_sqlite_name($m))
            return false;
        $z = new Min_SQLite($m);
        $z->query('PRAGMA encoding = "UTF-8"');
        $z->query('CREATE TABLE adminer (i)');
        $z->query('DROP TABLE adminer');
        return true;
    }
    function drop_databases($l)
    {
        global $i;
        $i->Min_SQLite(":memory:");
        foreach ($l as $m) {
            if (!@unlink($m)) {
                $i->error = lang(12);
                return false;
            }
        }
        return true;
    }
    function rename_database($B, $e)
    {
        global $i;
        if (!check_sqlite_name($B))
            return false;
        $i->Min_SQLite(":memory:");
        $i->error = lang(12);
        return @rename(DB, $B);
    }
    function auto_increment()
    {
        return " PRIMARY KEY" . (DRIVER == "sqlite" ? " AUTOINCREMENT" : "");
    }
    function alter_table($P, $B, $p, $tc, $bb, $Tb, $e, $Aa, $Ee)
    {
        $Ng = ($P == "" || $tc);
        foreach ($p as $o) {
            if ($o[0] != "" || !$o[1] || $o[2]) {
                $Ng = true;
                break;
            }
        }
        $c  = array();
        $we = array();
        $Re = false;
        foreach ($p as $o) {
            if ($o[1]) {
                if ($o[1][6])
                    $Re = true;
                $c[] = ($Ng ? "  " : "ADD ") . implode($o[1]);
                if ($o[0] != "")
                    $we[$o[0]] = $o[1][0];
            }
        }
        if ($Ng) {
            if ($P != "") {
                queries("BEGIN");
                foreach (foreign_keys($P) as $q) {
                    $g = array();
                    foreach ($q["source"] as $f) {
                        if (!$we[$f])
                            continue 2;
                        $g[] = $we[$f];
                    }
                    $tc[] = "  FOREIGN KEY (" . implode(", ", $g) . ") REFERENCES " . table($q["table"]) . " (" . implode(", ", array_map('idf_escape', $q["target"])) . ") ON DELETE $q[on_delete] ON UPDATE $q[on_update]";
                }
                $v = array();
                foreach (indexes($P) as $id => $u) {
                    $g = array();
                    foreach ($u["columns"] as $f) {
                        if (!$we[$f])
                            continue 2;
                        $g[] = $we[$f];
                    }
                    $g = "(" . implode(", ", $g) . ")";
                    if ($u["type"] != "PRIMARY")
                        $v[] = array(
                            $u["type"],
                            $id,
                            $g
                        );
                    elseif (!$Re)
                        $tc[] = "  PRIMARY KEY $g";
                }
            }
            $c = array_merge($c, $tc);
            if (!queries("CREATE TABLE " . table($P != "" ? "adminer_$B" : $B) . " (\n" . implode(",\n", $c) . "\n)"))
                return false;
            if ($P != "") {
                if ($we && !queries("INSERT INTO " . table("adminer_$B") . " (" . implode(", ", $we) . ") SELECT " . implode(", ", array_map('idf_escape', array_keys($we))) . " FROM " . table($P)))
                    return false;
                $Bg = array();
                foreach (triggers($P) as $_g => $mg) {
                    $yg   = trigger($_g);
                    $Bg[] = "CREATE TRIGGER " . idf_escape($_g) . " " . implode(" ", $mg) . " ON " . table($B) . "\n$yg[Statement]";
                }
                if (!queries("DROP TABLE " . table($P)))
                    return false;
                queries("ALTER TABLE " . table("adminer_$B") . " RENAME TO " . table($B));
                if (!alter_indexes($B, $v))
                    return false;
                foreach ($Bg as $yg) {
                    if (!queries($yg))
                        return false;
                }
                queries("COMMIT");
            }
        } else {
            foreach ($c as $X) {
                if (!queries("ALTER TABLE " . table($P) . " $X"))
                    return false;
            }
            if ($P != $B && !queries("ALTER TABLE " . table($P) . " RENAME TO " . table($B)))
                return false;
        }
        if ($Aa)
            queries("UPDATE sqlite_sequence SET seq = $Aa WHERE name = " . q($B));
        return true;
    }
    function index_sql($P, $T, $B, $g)
    {
        return "CREATE $T " . ($T != "INDEX" ? "INDEX " : "") . idf_escape($B != "" ? $B : uniqid($P . "_")) . " ON " . table($P) . " $g";
    }
    function alter_indexes($P, $c)
    {
        foreach (array_reverse($c) as $X) {
            if (!queries($X[2] == "DROP" ? "DROP INDEX " . idf_escape($X[1]) : index_sql($P, $X[0], $X[1], $X[2])))
                return false;
        }
        return true;
    }
    function truncate_tables($R)
    {
        return apply_queries("DELETE FROM", $R);
    }
    function drop_views($Wg)
    {
        return apply_queries("DROP VIEW", $Wg);
    }
    function drop_tables($R)
    {
        return apply_queries("DROP TABLE", $R);
    }
    function move_tables($R, $Wg, $fg)
    {
        return false;
    }
    function trigger($B)
    {
        global $i;
        if ($B == "")
            return array(
                "Statement" => "BEGIN\n\t;\nEND"
            );
        preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s+([a-z]+)\\s+ON\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*(?:FOR\\s*EACH\\s*ROW\\s)?(.*)~is', $i->result("SELECT sql FROM sqlite_master WHERE name = " . q($B)), $A);
        return array(
            "Timing" => strtoupper($A[1]),
            "Event" => strtoupper($A[2]),
            "Trigger" => $B,
            "Statement" => $A[3]
        );
    }
    function triggers($P)
    {
        $I = array();
        foreach (get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = " . q($P)) as $J) {
            preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s*([a-z]+)~i', $J["sql"], $A);
            $I[$J["name"]] = array(
                $A[1],
                $A[2]
            );
        }
        return $I;
    }
    function trigger_options()
    {
        return array(
            "Timing" => array(
                "BEFORE",
                "AFTER",
                "INSTEAD OF"
            ),
            "Type" => array(
                "FOR EACH ROW"
            )
        );
    }
    function routine($B, $T)
    {
    }
    function routines()
    {
    }
    function routine_languages()
    {
    }
    function begin()
    {
        return queries("BEGIN");
    }
    function insert_into($P, $N)
    {
        return queries("INSERT INTO " . table($P) . ($N ? " (" . implode(", ", array_keys($N)) . ")\nVALUES (" . implode(", ", $N) . ")" : "DEFAULT VALUES"));
    }
    function insert_update($P, $N, $Qe)
    {
        return queries("REPLACE INTO " . table($P) . " (" . implode(", ", array_keys($N)) . ") VALUES (" . implode(", ", $N) . ")");
    }
    function last_id()
    {
        global $i;
        return $i->result("SELECT LAST_INSERT_ROWID()");
    }
    function explain($i, $G)
    {
        return $i->query("EXPLAIN $G");
    }
    function found_rows($Q, $Z)
    {
    }
    function types()
    {
        return array();
    }
    function schemas()
    {
        return array();
    }
    function get_schema()
    {
        return "";
    }
    function set_schema($zf)
    {
        return true;
    }
    function create_sql($P, $Aa)
    {
        global $i;
        $I = $i->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = " . q($P));
        foreach (indexes($P) as $B => $u) {
            if ($B == '')
                continue;
            $I .= ";\n\n" . index_sql($P, $u['type'], $B, "(" . implode(", ", array_map('idf_escape', $u['columns'])) . ")");
        }
        return $I;
    }
    function truncate_sql($P)
    {
        return "DELETE FROM " . table($P);
    }
    function use_sql($qb)
    {
    }
    function trigger_sql($P, $Rf)
    {
        return implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = " . q($P)));
    }
    function show_variables()
    {
        global $i;
        $I = array();
        foreach (array(
            "auto_vacuum",
            "cache_size",
            "count_changes",
            "default_cache_size",
            "empty_result_callbacks",
            "encoding",
            "foreign_keys",
            "full_column_names",
            "fullfsync",
            "journal_mode",
            "journal_size_limit",
            "legacy_file_format",
            "locking_mode",
            "page_size",
            "max_page_count",
            "read_uncommitted",
            "recursive_triggers",
            "reverse_unordered_selects",
            "secure_delete",
            "short_column_names",
            "synchronous",
            "temp_store",
            "temp_store_directory",
            "schema_version",
            "integrity_check",
            "quick_check"
        ) as $x)
            $I[$x] = $i->result("PRAGMA $x");
        return $I;
    }
    function show_status()
    {
        $I = array();
        foreach (get_vals("PRAGMA compile_options") as $me) {
            list($x, $X) = explode("=", $me, 2);
            $I[$x] = $X;
        }
        return $I;
    }
    function convert_field($o)
    {
    }
    function unconvert_field($o, $I)
    {
        return $I;
    }
    function support($mc)
    {
        return ereg('^(view|trigger|variables|status|dump|move_col|drop_col)$', $mc);
    }
    $w  = "sqlite";
    $U  = array(
        "integer" => 0,
        "real" => 0,
        "numeric" => 0,
        "text" => 0,
        "blob" => 0
    );
    $Qf = array_keys($U);
    $Kg = array();
    $le = array(
        "=",
        "<",
        ">",
        "<=",
        ">=",
        "!=",
        "LIKE",
        "LIKE %%",
        "IN",
        "IS NULL",
        "NOT LIKE",
        "NOT IN",
        "IS NOT NULL",
        "SQL"
    );
    $Cc = array(
        "hex",
        "length",
        "lower",
        "round",
        "unixepoch",
        "upper"
    );
    $Hc = array(
        "avg",
        "count",
        "count distinct",
        "group_concat",
        "max",
        "min",
        "sum"
    );
    $Lb = array(
        array(),
        array(
            "integer|real|numeric" => "+/-",
            "text" => "||"
        )
    );
}
$Eb["pgsql"] = "PostgreSQL";
if (isset($_GET["pgsql"])) {
    $Ne = array(
        "PgSQL",
        "PDO_PgSQL"
    );
    define("DRIVER", "pgsql");
    if (extension_loaded("pgsql")) {
        class Min_DB
        {
            var $extension = "PgSQL", $_link, $_result, $_string, $_database = true, $server_info, $affected_rows, $error;
            function _error($Wb, $n)
            {
                if (ini_bool("html_errors"))
                    $n = html_entity_decode(strip_tags($n));
                $n           = ereg_replace('^[^:]*: ', '', $n);
                $this->error = $n;
            }
            function connect($M, $V, $E)
            {
                global $b;
                $m = $b->database();
                set_error_handler(array(
                    $this,
                    '_error'
                ));
                $this->_string = "host='" . str_replace(":", "' port='", addcslashes($M, "'\\")) . "' user='" . addcslashes($V, "'\\") . "' password='" . addcslashes($E, "'\\") . "'";
                $this->_link   = @pg_connect("$this->_string dbname='" . ($m != "" ? addcslashes($m, "'\\") : "postgres") . "'", PGSQL_CONNECT_FORCE_NEW);
                if (!$this->_link && $m != "") {
                    $this->_database = false;
                    $this->_link     = @pg_connect("$this->_string dbname='postgres'", PGSQL_CONNECT_FORCE_NEW);
                }
                restore_error_handler();
                if ($this->_link) {
                    $Ug                = pg_version($this->_link);
                    $this->server_info = $Ug["server"];
                    pg_set_client_encoding($this->_link, "UTF8");
                }
                return (bool) $this->_link;
            }
            function quote($O)
            {
                return "'" . pg_escape_string($this->_link, $O) . "'";
            }
            function select_db($qb)
            {
                global $b;
                if ($qb == $b->database())
                    return $this->_database;
                $I = @pg_connect("$this->_string dbname='" . addcslashes($qb, "'\\") . "'", PGSQL_CONNECT_FORCE_NEW);
                if ($I)
                    $this->_link = $I;
                return $I;
            }
            function close()
            {
                $this->_link = @pg_connect("$this->_string dbname='postgres'");
            }
            function query($G, $Eg = false)
            {
                $H           = @pg_query($this->_link, $G);
                $this->error = "";
                if (!$H) {
                    $this->error = pg_last_error($this->_link);
                    return false;
                } elseif (!pg_num_fields($H)) {
                    $this->affected_rows = pg_affected_rows($H);
                    return true;
                }
                return new Min_Result($H);
            }
            function multi_query($G)
            {
                return $this->_result = $this->query($G);
            }
            function store_result()
            {
                return $this->_result;
            }
            function next_result()
            {
                return false;
            }
            function result($G, $o = 0)
            {
                $H = $this->query($G);
                if (!$H || !$H->num_rows)
                    return false;
                return pg_fetch_result($H->_result, 0, $o);
            }
        }
        class Min_Result
        {
            var $_result, $_offset = 0, $num_rows;
            function Min_Result($H)
            {
                $this->_result  = $H;
                $this->num_rows = pg_num_rows($H);
            }
            function fetch_assoc()
            {
                return pg_fetch_assoc($this->_result);
            }
            function fetch_row()
            {
                return pg_fetch_row($this->_result);
            }
            function fetch_field()
            {
                $f = $this->_offset++;
                $I = new stdClass;
                if (function_exists('pg_field_table'))
                    $I->orgtable = pg_field_table($this->_result, $f);
                $I->name      = pg_field_name($this->_result, $f);
                $I->orgname   = $I->name;
                $I->type      = pg_field_type($this->_result, $f);
                $I->charsetnr = ($I->type == "bytea" ? 63 : 0);
                return $I;
            }
            function __destruct()
            {
                pg_free_result($this->_result);
            }
        }
    } elseif (extension_loaded("pdo_pgsql")) {
        class Min_DB extends Min_PDO
        {
            var $extension = "PDO_PgSQL";
            function connect($M, $V, $E)
            {
                global $b;
                $m = $b->database();
                $O = "pgsql:host='" . str_replace(":", "' port='", addcslashes($M, "'\\")) . "' options='-c client_encoding=utf8'";
                $this->dsn("$O dbname='" . ($m != "" ? addcslashes($m, "'\\") : "postgres") . "'", $V, $E);
                return true;
            }
            function select_db($qb)
            {
                global $b;
                return ($b->database() == $qb);
            }
            function close()
            {
            }
        }
    }
    function idf_escape($t)
    {
        return '"' . str_replace('"', '""', $t) . '"';
    }
    function table($t)
    {
        return idf_escape($t);
    }
    function connect()
    {
        global $b;
        $i  = new Min_DB;
        $mb = $b->credentials();
        if ($i->connect($mb[0], $mb[1], $mb[2])) {
            if ($i->server_info >= 9)
                $i->query("SET application_name = 'Adminer'");
            return $i;
        }
        return $i->error;
    }
    function get_databases()
    {
        return get_vals("SELECT datname FROM pg_database ORDER BY datname");
    }
    function limit($G, $Z, $y, $C = 0, $Cf = " ")
    {
        return " $G$Z" . ($y !== null ? $Cf . "LIMIT $y" . ($C ? " OFFSET $C" : "") : "");
    }
    function limit1($G, $Z)
    {
        return " $G$Z";
    }
    function db_collation($m, $Xa)
    {
        global $i;
        return $i->result("SHOW LC_COLLATE");
    }
    function engines()
    {
        return array();
    }
    function logged_user()
    {
        global $i;
        return $i->result("SELECT user");
    }
    function tables_list()
    {
        return get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");
    }
    function count_tables($l)
    {
        return array();
    }
    function table_status($B = "")
    {
        $I = array();
        foreach (get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
" . ($B != "" ? "AND relname = " . q($B) : "ORDER BY relname")) as $J)
            $I[$J["Name"]] = $J;
        return ($B != "" ? $I[$B] : $I);
    }
    function is_view($Q)
    {
        return $Q["Engine"] == "view";
    }
    function fk_support($Q)
    {
        return true;
    }
    function fields($P)
    {
        $I  = array();
        $va = array(
            'timestamp without time zone' => 'timestamp',
            'timestamp with time zone' => 'timestamptz'
        );
        foreach (get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = " . q($P) . "
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum") as $J) {
            $T = $J["full_type"];
            if (ereg('(.+)\\((.*)\\)$', $J["full_type"], $A))
                list(, $T, $J["length"]) = $A;
            $J["type"]           = ($va[$T] ? $va[$T] : $T);
            $J["full_type"]      = $J["type"] . ($J["length"] ? "($J[length])" : "");
            $J["null"]           = !$J["attnotnull"];
            $J["auto_increment"] = eregi("^nextval\\(", $J["default"]);
            $J["privileges"]     = array(
                "insert" => 1,
                "select" => 1,
                "update" => 1
            );
            if (preg_match('~^(.*)::.+$~', $J["default"], $A))
                $J["default"] = ($A[1][0] == "'" ? idf_unescape($A[1]) : $A[1]);
            $I[$J["field"]] = $J;
        }
        return $I;
    }
    function indexes($P, $j = null)
    {
        global $i;
        if (!is_object($j))
            $j = $i;
        $I  = array();
        $Zf = $j->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = " . q($P));
        $g  = get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Zf AND attnum > 0", $j);
        foreach (get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $Zf AND ci.oid = i.indexrelid", $j) as $J) {
            $kf                = $J["relname"];
            $I[$kf]["type"]    = ($J["indisprimary"] ? "PRIMARY" : ($J["indisunique"] ? "UNIQUE" : "INDEX"));
            $I[$kf]["columns"] = array();
            foreach (explode(" ", $J["indkey"]) as $Uc)
                $I[$kf]["columns"][] = $g[$Uc];
            $I[$kf]["descs"] = array();
            foreach (explode(" ", $J["indoption"]) as $Vc)
                $I[$kf]["descs"][] = ($Vc & 1 ? '1' : null);
            $I[$kf]["lengths"] = array();
        }
        return $I;
    }
    function foreign_keys($P)
    {
        global $he;
        $I = array();
        foreach (get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = " . q($P) . " AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname") as $J) {
            if (preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA', $J['definition'], $A)) {
                $J['source'] = array_map('trim', explode(',', $A[1]));
                $J['table']  = $A[2];
                if (preg_match('~(.+)\.(.+)~', $A[2], $Ad)) {
                    $J['ns']    = $Ad[1];
                    $J['table'] = $Ad[2];
                }
                $J['target']      = array_map('trim', explode(',', $A[3]));
                $J['on_delete']   = (preg_match("~ON DELETE ($he)~", $A[4], $Ad) ? $Ad[1] : 'NO ACTION');
                $J['on_update']   = (preg_match("~ON UPDATE ($he)~", $A[4], $Ad) ? $Ad[1] : 'NO ACTION');
                $I[$J['conname']] = $J;
            }
        }
        return $I;
    }
    function view($B)
    {
        global $i;
        return array(
            "select" => $i->result("SELECT pg_get_viewdef(" . q($B) . ")")
        );
    }
    function collations()
    {
        return array();
    }
    function information_schema($m)
    {
        return ($m == "information_schema");
    }
    function error()
    {
        global $i;
        $I = h($i->error);
        if (preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s', $I, $A))
            $I = $A[1] . preg_replace('~((?:[^&]|&[^;]*;){' . strlen($A[3]) . '})(.*)~', '\\1<b>\\2</b>', $A[2]) . $A[4];
        return nl_br($I);
    }
    function create_database($m, $e)
    {
        return queries("CREATE DATABASE " . idf_escape($m) . ($e ? " ENCODING " . idf_escape($e) : ""));
    }
    function drop_databases($l)
    {
        global $i;
        $i->close();
        return apply_queries("DROP DATABASE", $l, 'idf_escape');
    }
    function rename_database($B, $e)
    {
        return queries("ALTER DATABASE " . idf_escape(DB) . " RENAME TO " . idf_escape($B));
    }
    function auto_increment()
    {
        return "";
    }
    function alter_table($P, $B, $p, $tc, $bb, $Tb, $e, $Aa, $Ee)
    {
        $c  = array();
        $Ze = array();
        foreach ($p as $o) {
            $f = idf_escape($o[0]);
            $X = $o[1];
            if (!$X)
                $c[] = "DROP $f";
            else {
                $Rg = $X[5];
                unset($X[5]);
                if (isset($X[6]) && $o[0] == "")
                    $X[1] = ($X[1] == "bigint" ? " big" : " ") . "serial";
                if ($o[0] == "")
                    $c[] = ($P != "" ? "ADD " : "  ") . implode($X);
                else {
                    if ($f != $X[0])
                        $Ze[] = "ALTER TABLE " . table($P) . " RENAME $f TO $X[0]";
                    $c[] = "ALTER $f TYPE$X[1]";
                    if (!$X[6]) {
                        $c[] = "ALTER $f " . ($X[3] ? "SET$X[3]" : "DROP DEFAULT");
                        $c[] = "ALTER $f " . ($X[2] == " NULL" ? "DROP NOT" : "SET") . $X[2];
                    }
                }
                if ($o[0] != "" || $Rg != "")
                    $Ze[] = "COMMENT ON COLUMN " . table($P) . ".$X[0] IS " . ($Rg != "" ? substr($Rg, 9) : "''");
            }
        }
        $c = array_merge($c, $tc);
        if ($P == "")
            array_unshift($Ze, "CREATE TABLE " . table($B) . " (\n" . implode(",\n", $c) . "\n)");
        elseif ($c)
            array_unshift($Ze, "ALTER TABLE " . table($P) . "\n" . implode(",\n", $c));
        if ($P != "" && $P != $B)
            $Ze[] = "ALTER TABLE " . table($P) . " RENAME TO " . table($B);
        if ($P != "" || $bb != "")
            $Ze[] = "COMMENT ON TABLE " . table($B) . " IS " . q($bb);
        if ($Aa != "") {
        }
        foreach ($Ze as $G) {
            if (!queries($G))
                return false;
        }
        return true;
    }
    function alter_indexes($P, $c)
    {
        $k  = array();
        $Fb = array();
        $Ze = array();
        foreach ($c as $X) {
            if ($X[0] != "INDEX")
                $k[] = ($X[2] == "DROP" ? "\nDROP CONSTRAINT " . idf_escape($X[1]) : "\nADD" . ($X[1] != "" ? " CONSTRAINT " . idf_escape($X[1]) : "") . " $X[0] " . ($X[0] == "PRIMARY" ? "KEY " : "") . $X[2]);
            elseif ($X[2] == "DROP")
                $Fb[] = idf_escape($X[1]);
            else
                $Ze[] = "CREATE INDEX " . idf_escape($X[1] != "" ? $X[1] : uniqid($P . "_")) . " ON " . table($P) . " $X[2]";
        }
        if ($k)
            array_unshift($Ze, "ALTER TABLE " . table($P) . implode(",", $k));
        if ($Fb)
            array_unshift($Ze, "DROP INDEX " . implode(", ", $Fb));
        foreach ($Ze as $G) {
            if (!queries($G))
                return false;
        }
        return true;
    }
    function truncate_tables($R)
    {
        return queries("TRUNCATE " . implode(", ", array_map('table', $R)));
        return true;
    }
    function drop_views($Wg)
    {
        return queries("DROP VIEW " . implode(", ", array_map('table', $Wg)));
    }
    function drop_tables($R)
    {
        return queries("DROP TABLE " . implode(", ", array_map('table', $R)));
    }
    function move_tables($R, $Wg, $fg)
    {
        foreach ($R as $P) {
            if (!queries("ALTER TABLE " . table($P) . " SET SCHEMA " . idf_escape($fg)))
                return false;
        }
        foreach ($Wg as $P) {
            if (!queries("ALTER VIEW " . table($P) . " SET SCHEMA " . idf_escape($fg)))
                return false;
        }
        return true;
    }
    function trigger($B)
    {
        if ($B == "")
            return array(
                "Statement" => "EXECUTE PROCEDURE ()"
            );
        $K = get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = ' . q($_GET["trigger"]) . ' AND trigger_name = ' . q($B));
        return reset($K);
    }
    function triggers($P)
    {
        $I = array();
        foreach (get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = " . q($P)) as $J)
            $I[$J["trigger_name"]] = array(
                $J["condition_timing"],
                $J["event_manipulation"]
            );
        return $I;
    }
    function trigger_options()
    {
        return array(
            "Timing" => array(
                "BEFORE",
                "AFTER"
            ),
            "Type" => array(
                "FOR EACH ROW",
                "FOR EACH STATEMENT"
            )
        );
    }
    function routines()
    {
        return get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');
    }
    function routine_languages()
    {
        return get_vals("SELECT langname FROM pg_catalog.pg_language");
    }
    function begin()
    {
        return queries("BEGIN");
    }
    function insert_into($P, $N)
    {
        return queries("INSERT INTO " . table($P) . ($N ? " (" . implode(", ", array_keys($N)) . ")\nVALUES (" . implode(", ", $N) . ")" : "DEFAULT VALUES"));
    }
    function insert_update($P, $N, $Qe)
    {
        global $i;
        $Lg = array();
        $Z  = array();
        foreach ($N as $x => $X) {
            $Lg[] = "$x = $X";
            if (isset($Qe[idf_unescape($x)]))
                $Z[] = "$x = $X";
        }
        return ($Z && queries("UPDATE " . table($P) . " SET " . implode(", ", $Lg) . " WHERE " . implode(" AND ", $Z)) && $i->affected_rows) || queries("INSERT INTO " . table($P) . " (" . implode(", ", array_keys($N)) . ") VALUES (" . implode(", ", $N) . ")");
    }
    function last_id()
    {
        return 0;
    }
    function explain($i, $G)
    {
        return $i->query("EXPLAIN $G");
    }
    function found_rows($Q, $Z)
    {
        global $i;
        if (ereg(" rows=([0-9]+)", $i->result("EXPLAIN SELECT * FROM " . idf_escape($Q["Name"]) . ($Z ? " WHERE " . implode(" AND ", $Z) : "")), $jf))
            return $jf[1];
        return false;
    }
    function types()
    {
        return get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");
    }
    function schemas()
    {
        return get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");
    }
    function get_schema()
    {
        global $i;
        return $i->result("SELECT current_schema()");
    }
    function set_schema($yf)
    {
        global $i, $U, $Qf;
        $I = $i->query("SET search_path TO " . idf_escape($yf));
        foreach (types() as $T) {
            if (!isset($U[$T])) {
                $U[$T]          = 0;
                $Qf[lang(13)][] = $T;
            }
        }
        return $I;
    }
    function use_sql($qb)
    {
        return "\connect " . idf_escape($qb);
    }
    function show_variables()
    {
        return get_key_vals("SHOW ALL");
    }
    function process_list()
    {
        global $i;
        return get_rows("SELECT * FROM pg_stat_activity ORDER BY " . ($i->server_info < 9.2 ? "procpid" : "pid"));
    }
    function show_status()
    {
    }
    function convert_field($o)
    {
    }
    function unconvert_field($o, $I)
    {
        return $I;
    }
    function support($mc)
    {
        return ereg('^(comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$', $mc);
    }
    $w  = "pgsql";
    $U  = array();
    $Qf = array();
    foreach (array(
        lang(14) => array(
            "smallint" => 5,
            "integer" => 10,
            "bigint" => 19,
            "boolean" => 1,
            "numeric" => 0,
            "real" => 7,
            "double precision" => 16,
            "money" => 20
        ),
        lang(15) => array(
            "date" => 13,
            "time" => 17,
            "timestamp" => 20,
            "timestamptz" => 21,
            "interval" => 0
        ),
        lang(16) => array(
            "character" => 0,
            "character varying" => 0,
            "text" => 0,
            "tsquery" => 0,
            "tsvector" => 0,
            "uuid" => 0,
            "xml" => 0
        ),
        lang(17) => array(
            "bit" => 0,
            "bit varying" => 0,
            "bytea" => 0
        ),
        lang(18) => array(
            "cidr" => 43,
            "inet" => 43,
            "macaddr" => 17,
            "txid_snapshot" => 0
        ),
        lang(19) => array(
            "box" => 0,
            "circle" => 0,
            "line" => 0,
            "lseg" => 0,
            "path" => 0,
            "point" => 0,
            "polygon" => 0
        )
    ) as $x => $X) {
        $U += $X;
        $Qf[$x] = array_keys($X);
    }
    $Kg = array();
    $le = array(
        "=",
        "<",
        ">",
        "<=",
        ">=",
        "!=",
        "~",
        "!~",
        "LIKE",
        "LIKE %%",
        "IN",
        "IS NULL",
        "NOT LIKE",
        "NOT IN",
        "IS NOT NULL"
    );
    $Cc = array(
        "char_length",
        "lower",
        "round",
        "to_hex",
        "to_timestamp",
        "upper"
    );
    $Hc = array(
        "avg",
        "count",
        "count distinct",
        "max",
        "min",
        "sum"
    );
    $Lb = array(
        array(
            "char" => "md5",
            "date|time" => "now"
        ),
        array(
            "int|numeric|real|money" => "+/-",
            "date|time" => "+ interval/- interval",
            "char|text" => "||"
        )
    );
}
$Eb["oracle"] = "Oracle";
if (isset($_GET["oracle"])) {
    $Ne = array(
        "OCI8",
        "PDO_OCI"
    );
    define("DRIVER", "oracle");
    if (extension_loaded("oci8")) {
        class Min_DB
        {
            var $extension = "oci8", $_link, $_result, $server_info, $affected_rows, $errno, $error;
            function _error($Wb, $n)
            {
                if (ini_bool("html_errors"))
                    $n = html_entity_decode(strip_tags($n));
                $n           = ereg_replace('^[^:]*: ', '', $n);
                $this->error = $n;
            }
            function connect($M, $V, $E)
            {
                $this->_link = @oci_new_connect($V, $E, $M, "AL32UTF8");
                if ($this->_link) {
                    $this->server_info = oci_server_version($this->_link);
                    return true;
                }
                $n           = oci_error();
                $this->error = $n["message"];
                return false;
            }
            function quote($O)
            {
                return "'" . str_replace("'", "''", $O) . "'";
            }
            function select_db($qb)
            {
                return true;
            }
            function query($G, $Eg = false)
            {
                $H           = oci_parse($this->_link, $G);
                $this->error = "";
                if (!$H) {
                    $n           = oci_error($this->_link);
                    $this->errno = $n["code"];
                    $this->error = $n["message"];
                    return false;
                }
                set_error_handler(array(
                    $this,
                    '_error'
                ));
                $I = @oci_execute($H);
                restore_error_handler();
                if ($I) {
                    if (oci_num_fields($H))
                        return new Min_Result($H);
                    $this->affected_rows = oci_num_rows($H);
                }
                return $I;
            }
            function multi_query($G)
            {
                return $this->_result = $this->query($G);
            }
            function store_result()
            {
                return $this->_result;
            }
            function next_result()
            {
                return false;
            }
            function result($G, $o = 1)
            {
                $H = $this->query($G);
                if (!is_object($H) || !oci_fetch($H->_result))
                    return false;
                return oci_result($H->_result, $o);
            }
        }
        class Min_Result
        {
            var $_result, $_offset = 1, $num_rows;
            function Min_Result($H)
            {
                $this->_result = $H;
            }
            function _convert($J)
            {
                foreach ((array) $J as $x => $X) {
                    if (is_a($X, 'OCI-Lob'))
                        $J[$x] = $X->load();
                }
                return $J;
            }
            function fetch_assoc()
            {
                return $this->_convert(oci_fetch_assoc($this->_result));
            }
            function fetch_row()
            {
                return $this->_convert(oci_fetch_row($this->_result));
            }
            function fetch_field()
            {
                $f            = $this->_offset++;
                $I            = new stdClass;
                $I->name      = oci_field_name($this->_result, $f);
                $I->orgname   = $I->name;
                $I->type      = oci_field_type($this->_result, $f);
                $I->charsetnr = (ereg("raw|blob|bfile", $I->type) ? 63 : 0);
                return $I;
            }
            function __destruct()
            {
                oci_free_statement($this->_result);
            }
        }
    } elseif (extension_loaded("pdo_oci")) {
        class Min_DB extends Min_PDO
        {
            var $extension = "PDO_OCI";
            function connect($M, $V, $E)
            {
                $this->dsn("oci:dbname=//$M;charset=AL32UTF8", $V, $E);
                return true;
            }
            function select_db($qb)
            {
                return true;
            }
        }
    }
    function idf_escape($t)
    {
        return '"' . str_replace('"', '""', $t) . '"';
    }
    function table($t)
    {
        return idf_escape($t);
    }
    function connect()
    {
        global $b;
        $i  = new Min_DB;
        $mb = $b->credentials();
        if ($i->connect($mb[0], $mb[1], $mb[2]))
            return $i;
        return $i->error;
    }
    function get_databases()
    {
        return get_vals("SELECT tablespace_name FROM user_tablespaces");
    }
    function limit($G, $Z, $y, $C = 0, $Cf = " ")
    {
        return ($C ? " * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= " . ($y + $C) . ") WHERE rnum > $C" : ($y !== null ? " * FROM (SELECT $G$Z) WHERE rownum <= " . ($y + $C) : " $G$Z"));
    }
    function limit1($G, $Z)
    {
        return " $G$Z";
    }
    function db_collation($m, $Xa)
    {
        global $i;
        return $i->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");
    }
    function engines()
    {
        return array();
    }
    function logged_user()
    {
        global $i;
        return $i->result("SELECT USER FROM DUAL");
    }
    function tables_list()
    {
        return get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = " . q(DB) . "
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");
    }
    function count_tables($l)
    {
        return array();
    }
    function table_status($B = "")
    {
        $I  = array();
        $_f = q($B);
        foreach (get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = ' . q(DB) . ($B != "" ? " AND table_name = $_f" : "") . "
UNION SELECT view_name, 'view', 0, 0 FROM user_views" . ($B != "" ? " WHERE view_name = $_f" : "") . "
ORDER BY 1") as $J) {
            if ($B != "")
                return $J;
            $I[$J["Name"]] = $J;
        }
        return $I;
    }
    function is_view($Q)
    {
        return $Q["Engine"] == "view";
    }
    function fk_support($Q)
    {
        return true;
    }
    function fields($P)
    {
        $I = array();
        foreach (get_rows("SELECT * FROM all_tab_columns WHERE table_name = " . q($P) . " ORDER BY column_id") as $J) {
            $T  = $J["DATA_TYPE"];
            $vd = "$J[DATA_PRECISION],$J[DATA_SCALE]";
            if ($vd == ",")
                $vd = $J["DATA_LENGTH"];
            $I[$J["COLUMN_NAME"]] = array(
                "field" => $J["COLUMN_NAME"],
                "full_type" => $T . ($vd ? "($vd)" : ""),
                "type" => strtolower($T),
                "length" => $vd,
                "default" => $J["DATA_DEFAULT"],
                "null" => ($J["NULLABLE"] == "Y"),
                "privileges" => array(
                    "insert" => 1,
                    "select" => 1,
                    "update" => 1
                )
            );
        }
        return $I;
    }
    function indexes($P, $j = null)
    {
        $I = array();
        foreach (get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = " . q($P) . "
ORDER BY uc.constraint_type, uic.column_position", $j) as $J) {
            $Sc                  = $J["INDEX_NAME"];
            $I[$Sc]["type"]      = ($J["CONSTRAINT_TYPE"] == "P" ? "PRIMARY" : ($J["CONSTRAINT_TYPE"] == "U" ? "UNIQUE" : "INDEX"));
            $I[$Sc]["columns"][] = $J["COLUMN_NAME"];
            $I[$Sc]["lengths"][] = ($J["CHAR_LENGTH"] && $J["CHAR_LENGTH"] != $J["COLUMN_LENGTH"] ? $J["CHAR_LENGTH"] : null);
            $I[$Sc]["descs"][]   = ($J["DESCEND"] ? '1' : null);
        }
        return $I;
    }
    function view($B)
    {
        $K = get_rows('SELECT text "select" FROM user_views WHERE view_name = ' . q($B));
        return reset($K);
    }
    function collations()
    {
        return array();
    }
    function information_schema($m)
    {
        return false;
    }
    function error()
    {
        global $i;
        return h($i->error);
    }
    function explain($i, $G)
    {
        $i->query("EXPLAIN PLAN FOR $G");
        return $i->query("SELECT * FROM plan_table");
    }
    function found_rows($Q, $Z)
    {
    }
    function alter_table($P, $B, $p, $tc, $bb, $Tb, $e, $Aa, $Ee)
    {
        $c = $Fb = array();
        foreach ($p as $o) {
            $X = $o[1];
            if ($X && $o[0] != "" && idf_escape($o[0]) != $X[0])
                queries("ALTER TABLE " . table($P) . " RENAME COLUMN " . idf_escape($o[0]) . " TO $X[0]");
            if ($X)
                $c[] = ($P != "" ? ($o[0] != "" ? "MODIFY (" : "ADD (") : "  ") . implode($X) . ($P != "" ? ")" : "");
            else
                $Fb[] = idf_escape($o[0]);
        }
        if ($P == "")
            return queries("CREATE TABLE " . table($B) . " (\n" . implode(",\n", $c) . "\n)");
        return (!$c || queries("ALTER TABLE " . table($P) . "\n" . implode("\n", $c))) && (!$Fb || queries("ALTER TABLE " . table($P) . " DROP (" . implode(", ", $Fb) . ")")) && ($P == $B || queries("ALTER TABLE " . table($P) . " RENAME TO " . table($B)));
    }
    function foreign_keys($P)
    {
        return array();
    }
    function truncate_tables($R)
    {
        return apply_queries("TRUNCATE TABLE", $R);
    }
    function drop_views($Wg)
    {
        return apply_queries("DROP VIEW", $Wg);
    }
    function drop_tables($R)
    {
        return apply_queries("DROP TABLE", $R);
    }
    function begin()
    {
        return true;
    }
    function insert_into($P, $N)
    {
        return queries("INSERT INTO " . table($P) . " (" . implode(", ", array_keys($N)) . ")\nVALUES (" . implode(", ", $N) . ")");
    }
    function last_id()
    {
        return 0;
    }
    function schemas()
    {
        return get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");
    }
    function get_schema()
    {
        global $i;
        return $i->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");
    }
    function set_schema($zf)
    {
        global $i;
        return $i->query("ALTER SESSION SET CURRENT_SCHEMA = " . idf_escape($zf));
    }
    function show_variables()
    {
        return get_key_vals('SELECT name, display_value FROM v$parameter');
    }
    function process_list()
    {
        return get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');
    }
    function show_status()
    {
        $K = get_rows('SELECT * FROM v$instance');
        return reset($K);
    }
    function convert_field($o)
    {
    }
    function unconvert_field($o, $I)
    {
        return $I;
    }
    function support($mc)
    {
        return ereg("view|scheme|processlist|drop_col|variables|status", $mc);
    }
    $w  = "oracle";
    $U  = array();
    $Qf = array();
    foreach (array(
        lang(14) => array(
            "number" => 38,
            "binary_float" => 12,
            "binary_double" => 21
        ),
        lang(15) => array(
            "date" => 10,
            "timestamp" => 29,
            "interval year" => 12,
            "interval day" => 28
        ),
        lang(16) => array(
            "char" => 2000,
            "varchar2" => 4000,
            "nchar" => 2000,
            "nvarchar2" => 4000,
            "clob" => 4294967295,
            "nclob" => 4294967295
        ),
        lang(17) => array(
            "raw" => 2000,
            "long raw" => 2147483648,
            "blob" => 4294967295,
            "bfile" => 4294967296
        )
    ) as $x => $X) {
        $U += $X;
        $Qf[$x] = array_keys($X);
    }
    $Kg = array();
    $le = array(
        "=",
        "<",
        ">",
        "<=",
        ">=",
        "!=",
        "LIKE",
        "LIKE %%",
        "IN",
        "IS NULL",
        "NOT LIKE",
        "NOT REGEXP",
        "NOT IN",
        "IS NOT NULL",
        "SQL"
    );
    $Cc = array(
        "length",
        "lower",
        "round",
        "upper"
    );
    $Hc = array(
        "avg",
        "count",
        "count distinct",
        "max",
        "min",
        "sum"
    );
    $Lb = array(
        array(
            "date" => "current_date",
            "timestamp" => "current_timestamp"
        ),
        array(
            "number|float|double" => "+/-",
            "date|timestamp" => "+ interval/- interval",
            "char|clob" => "||"
        )
    );
}
$Eb["mssql"] = "MS SQL";
if (isset($_GET["mssql"])) {
    $Ne = array(
        "SQLSRV",
        "MSSQL"
    );
    define("DRIVER", "mssql");
    if (extension_loaded("sqlsrv")) {
        class Min_DB
        {
            var $extension = "sqlsrv", $_link, $_result, $server_info, $affected_rows, $errno, $error;
            function _get_error()
            {
                $this->error = "";
                foreach (sqlsrv_errors() as $n) {
                    $this->errno = $n["code"];
                    $this->error .= "$n[message]\n";
                }
                $this->error = rtrim($this->error);
            }
            function connect($M, $V, $E)
            {
                $this->_link = @sqlsrv_connect($M, array(
                    "UID" => $V,
                    "PWD" => $E,
                    "CharacterSet" => "UTF-8"
                ));
                if ($this->_link) {
                    $Wc                = sqlsrv_server_info($this->_link);
                    $this->server_info = $Wc['SQLServerVersion'];
                } else
                    $this->_get_error();
                return (bool) $this->_link;
            }
            function quote($O)
            {
                return "'" . str_replace("'", "''", $O) . "'";
            }
            function select_db($qb)
            {
                return $this->query("USE " . idf_escape($qb));
            }
            function query($G, $Eg = false)
            {
                $H           = sqlsrv_query($this->_link, $G);
                $this->error = "";
                if (!$H) {
                    $this->_get_error();
                    return false;
                }
                return $this->store_result($H);
            }
            function multi_query($G)
            {
                $this->_result = sqlsrv_query($this->_link, $G);
                $this->error   = "";
                if (!$this->_result) {
                    $this->_get_error();
                    return false;
                }
                return true;
            }
            function store_result($H = null)
            {
                if (!$H)
                    $H = $this->_result;
                if (sqlsrv_field_metadata($H))
                    return new Min_Result($H);
                $this->affected_rows = sqlsrv_rows_affected($H);
                return true;
            }
            function next_result()
            {
                return sqlsrv_next_result($this->_result);
            }
            function result($G, $o = 0)
            {
                $H = $this->query($G);
                if (!is_object($H))
                    return false;
                $J = $H->fetch_row();
                return $J[$o];
            }
        }
        class Min_Result
        {
            var $_result, $_offset = 0, $_fields, $num_rows;
            function Min_Result($H)
            {
                $this->_result = $H;
            }
            function _convert($J)
            {
                foreach ((array) $J as $x => $X) {
                    if (is_a($X, 'DateTime'))
                        $J[$x] = $X->format("Y-m-d H:i:s");
                }
                return $J;
            }
            function fetch_assoc()
            {
                return $this->_convert(sqlsrv_fetch_array($this->_result, SQLSRV_FETCH_ASSOC, SQLSRV_SCROLL_NEXT));
            }
            function fetch_row()
            {
                return $this->_convert(sqlsrv_fetch_array($this->_result, SQLSRV_FETCH_NUMERIC, SQLSRV_SCROLL_NEXT));
            }
            function fetch_field()
            {
                if (!$this->_fields)
                    $this->_fields = sqlsrv_field_metadata($this->_result);
                $o          = $this->_fields[$this->_offset++];
                $I          = new stdClass;
                $I->name    = $o["Name"];
                $I->orgname = $o["Name"];
                $I->type    = ($o["Type"] == 1 ? 254 : 0);
                return $I;
            }
            function seek($C)
            {
                for ($s = 0; $s < $C; $s++)
                    sqlsrv_fetch($this->_result);
            }
            function __destruct()
            {
                sqlsrv_free_stmt($this->_result);
            }
        }
    } elseif (extension_loaded("mssql")) {
        class Min_DB
        {
            var $extension = "MSSQL", $_link, $_result, $server_info, $affected_rows, $error;
            function connect($M, $V, $E)
            {
                $this->_link = @mssql_connect($M, $V, $E);
                if ($this->_link) {
                    $H                 = $this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");
                    $J                 = $H->fetch_row();
                    $this->server_info = $this->result("sp_server_info 2", 2) . " [$J[0]] $J[1]";
                } else
                    $this->error = mssql_get_last_message();
                return (bool) $this->_link;
            }
            function quote($O)
            {
                return "'" . str_replace("'", "''", $O) . "'";
            }
            function select_db($qb)
            {
                return mssql_select_db($qb);
            }
            function query($G, $Eg = false)
            {
                $H           = mssql_query($G, $this->_link);
                $this->error = "";
                if (!$H) {
                    $this->error = mssql_get_last_message();
                    return false;
                }
                if ($H === true) {
                    $this->affected_rows = mssql_rows_affected($this->_link);
                    return true;
                }
                return new Min_Result($H);
            }
            function multi_query($G)
            {
                return $this->_result = $this->query($G);
            }
            function store_result()
            {
                return $this->_result;
            }
            function next_result()
            {
                return mssql_next_result($this->_result);
            }
            function result($G, $o = 0)
            {
                $H = $this->query($G);
                if (!is_object($H))
                    return false;
                return mssql_result($H->_result, 0, $o);
            }
        }
        class Min_Result
        {
            var $_result, $_offset = 0, $_fields, $num_rows;
            function Min_Result($H)
            {
                $this->_result  = $H;
                $this->num_rows = mssql_num_rows($H);
            }
            function fetch_assoc()
            {
                return mssql_fetch_assoc($this->_result);
            }
            function fetch_row()
            {
                return mssql_fetch_row($this->_result);
            }
            function num_rows()
            {
                return mssql_num_rows($this->_result);
            }
            function fetch_field()
            {
                $I           = mssql_fetch_field($this->_result);
                $I->orgtable = $I->table;
                $I->orgname  = $I->name;
                return $I;
            }
            function seek($C)
            {
                mssql_data_seek($this->_result, $C);
            }
            function __destruct()
            {
                mssql_free_result($this->_result);
            }
        }
    }
    function idf_escape($t)
    {
        return "[" . str_replace("]", "]]", $t) . "]";
    }
    function table($t)
    {
        return ($_GET["ns"] != "" ? idf_escape($_GET["ns"]) . "." : "") . idf_escape($t);
    }
    function connect()
    {
        global $b;
        $i  = new Min_DB;
        $mb = $b->credentials();
        if ($i->connect($mb[0], $mb[1], $mb[2]))
            return $i;
        return $i->error;
    }
    function get_databases()
    {
        return get_vals("EXEC sp_databases");
    }
    function limit($G, $Z, $y, $C = 0, $Cf = " ")
    {
        return ($y !== null ? " TOP (" . ($y + $C) . ")" : "") . " $G$Z";
    }
    function limit1($G, $Z)
    {
        return limit($G, $Z, 1);
    }
    function db_collation($m, $Xa)
    {
        global $i;
        return $i->result("SELECT collation_name FROM sys.databases WHERE name =  " . q($m));
    }
    function engines()
    {
        return array();
    }
    function logged_user()
    {
        global $i;
        return $i->result("SELECT SUSER_NAME()");
    }
    function tables_list()
    {
        return get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(" . q(get_schema()) . ") AND type IN ('S', 'U', 'V') ORDER BY name");
    }
    function count_tables($l)
    {
        global $i;
        $I = array();
        foreach ($l as $m) {
            $i->select_db($m);
            $I[$m] = $i->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");
        }
        return $I;
    }
    function table_status($B = "")
    {
        $I = array();
        foreach (get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(" . q(get_schema()) . ") AND type IN ('S', 'U', 'V') " . ($B != "" ? "AND name = " . q($B) : "ORDER BY name")) as $J) {
            if ($B != "")
                return $J;
            $I[$J["Name"]] = $J;
        }
        return $I;
    }
    function is_view($Q)
    {
        return $Q["Engine"] == "VIEW";
    }
    function fk_support($Q)
    {
        return true;
    }
    function fields($P)
    {
        $I = array();
        foreach (get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(" . q(get_schema()) . ") AND o.type IN ('S', 'U', 'V') AND o.name = " . q($P)) as $J) {
            $T             = $J["type"];
            $vd            = (ereg("char|binary", $T) ? $J["max_length"] : ($T == "decimal" ? "$J[precision],$J[scale]" : ""));
            $I[$J["name"]] = array(
                "field" => $J["name"],
                "full_type" => $T . ($vd ? "($vd)" : ""),
                "type" => $T,
                "length" => $vd,
                "default" => $J["default"],
                "null" => $J["is_nullable"],
                "auto_increment" => $J["is_identity"],
                "collation" => $J["collation_name"],
                "privileges" => array(
                    "insert" => 1,
                    "select" => 1,
                    "update" => 1
                ),
                "primary" => $J["is_identity"]
            );
        }
        return $I;
    }
    function indexes($P, $j = null)
    {
        $I = array();
        foreach (get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = " . q($P), $j) as $J) {
            $B                                   = $J["name"];
            $I[$B]["type"]                       = ($J["is_primary_key"] ? "PRIMARY" : ($J["is_unique"] ? "UNIQUE" : "INDEX"));
            $I[$B]["lengths"]                    = array();
            $I[$B]["columns"][$J["key_ordinal"]] = $J["column_name"];
            $I[$B]["descs"][$J["key_ordinal"]]   = ($J["is_descending_key"] ? '1' : null);
        }
        return $I;
    }
    function view($B)
    {
        global $i;
        return array(
            "select" => preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU', '', $i->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = " . q($B)))
        );
    }
    function collations()
    {
        $I = array();
        foreach (get_vals("SELECT name FROM fn_helpcollations()") as $e)
            $I[ereg_replace("_.*", "", $e)][] = $e;
        return $I;
    }
    function information_schema($m)
    {
        return false;
    }
    function error()
    {
        global $i;
        return nl_br(h(preg_replace('~^(\\[[^]]*])+~m', '', $i->error)));
    }
    function create_database($m, $e)
    {
        return queries("CREATE DATABASE " . idf_escape($m) . (eregi('^[a-z0-9_]+$', $e) ? " COLLATE $e" : ""));
    }
    function drop_databases($l)
    {
        return queries("DROP DATABASE " . implode(", ", array_map('idf_escape', $l)));
    }
    function rename_database($B, $e)
    {
        if (eregi('^[a-z0-9_]+$', $e))
            queries("ALTER DATABASE " . idf_escape(DB) . " COLLATE $e");
        queries("ALTER DATABASE " . idf_escape(DB) . " MODIFY NAME = " . idf_escape($B));
        return true;
    }
    function auto_increment()
    {
        return " IDENTITY" . ($_POST["Auto_increment"] != "" ? "(" . (+$_POST["Auto_increment"]) . ",1)" : "") . " PRIMARY KEY";
    }
    function alter_table($P, $B, $p, $tc, $bb, $Tb, $e, $Aa, $Ee)
    {
        $c = array();
        foreach ($p as $o) {
            $f = idf_escape($o[0]);
            $X = $o[1];
            if (!$X)
                $c["DROP"][] = " COLUMN $f";
            else {
                $X[1] = preg_replace("~( COLLATE )'(\\w+)'~", "\\1\\2", $X[1]);
                if ($o[0] == "")
                    $c["ADD"][] = "\n  " . implode("", $X) . ($P == "" ? substr($tc[$X[0]], 16 + strlen($X[0])) : "");
                else {
                    unset($X[6]);
                    if ($f != $X[0])
                        queries("EXEC sp_rename " . q(table($P) . ".$f") . ", " . q(idf_unescape($X[0])) . ", 'COLUMN'");
                    $c["ALTER COLUMN " . implode("", $X)][] = "";
                }
            }
        }
        if ($P == "")
            return queries("CREATE TABLE " . table($B) . " (" . implode(",", (array) $c["ADD"]) . "\n)");
        if ($P != $B)
            queries("EXEC sp_rename " . q(table($P)) . ", " . q($B));
        if ($tc)
            $c[""] = $tc;
        foreach ($c as $x => $X) {
            if (!queries("ALTER TABLE " . idf_escape($B) . " $x" . implode(",", $X)))
                return false;
        }
        return true;
    }
    function alter_indexes($P, $c)
    {
        $u  = array();
        $Fb = array();
        foreach ($c as $X) {
            if ($X[2] == "DROP") {
                if ($X[0] == "PRIMARY")
                    $Fb[] = idf_escape($X[1]);
                else
                    $u[] = idf_escape($X[1]) . " ON " . table($P);
            } elseif (!queries(($X[0] != "PRIMARY" ? "CREATE $X[0] " . ($X[0] != "INDEX" ? "INDEX " : "") . idf_escape($X[1] != "" ? $X[1] : uniqid($P . "_")) . " ON " . table($P) : "ALTER TABLE " . table($P) . " ADD PRIMARY KEY") . " $X[2]"))
                return false;
        }
        return (!$u || queries("DROP INDEX " . implode(", ", $u))) && (!$Fb || queries("ALTER TABLE " . table($P) . " DROP " . implode(", ", $Fb)));
    }
    function begin()
    {
        return queries("BEGIN TRANSACTION");
    }
    function insert_into($P, $N)
    {
        return queries("INSERT INTO " . table($P) . ($N ? " (" . implode(", ", array_keys($N)) . ")\nVALUES (" . implode(", ", $N) . ")" : "DEFAULT VALUES"));
    }
    function insert_update($P, $N, $Qe)
    {
        $Lg = array();
        $Z  = array();
        foreach ($N as $x => $X) {
            $Lg[] = "$x = $X";
            if (isset($Qe[idf_unescape($x)]))
                $Z[] = "$x = $X";
        }
        return queries("MERGE " . table($P) . " USING (VALUES(" . implode(", ", $N) . ")) AS source (c" . implode(", c", range(1, count($N))) . ") ON " . implode(" AND ", $Z) . " WHEN MATCHED THEN UPDATE SET " . implode(", ", $Lg) . " WHEN NOT MATCHED THEN INSERT (" . implode(", ", array_keys($N)) . ") VALUES (" . implode(", ", $N) . ");");
    }
    function last_id()
    {
        global $i;
        return $i->result("SELECT SCOPE_IDENTITY()");
    }
    function explain($i, $G)
    {
        $i->query("SET SHOWPLAN_ALL ON");
        $I = $i->query($G);
        $i->query("SET SHOWPLAN_ALL OFF");
        return $I;
    }
    function found_rows($Q, $Z)
    {
    }
    function foreign_keys($P)
    {
        $I = array();
        foreach (get_rows("EXEC sp_fkeys @fktable_name = " . q($P)) as $J) {
            $q =& $I[$J["FK_NAME"]];
            $q["table"]    = $J["PKTABLE_NAME"];
            $q["source"][] = $J["FKCOLUMN_NAME"];
            $q["target"][] = $J["PKCOLUMN_NAME"];
        }
        return $I;
    }
    function truncate_tables($R)
    {
        return apply_queries("TRUNCATE TABLE", $R);
    }
    function drop_views($Wg)
    {
        return queries("DROP VIEW " . implode(", ", array_map('table', $Wg)));
    }
    function drop_tables($R)
    {
        return queries("DROP TABLE " . implode(", ", array_map('table', $R)));
    }
    function move_tables($R, $Wg, $fg)
    {
        return apply_queries("ALTER SCHEMA " . idf_escape($fg) . " TRANSFER", array_merge($R, $Wg));
    }
    function trigger($B)
    {
        if ($B == "")
            return array();
        $K = get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = " . q($B));
        $I = reset($K);
        if ($I)
            $I["Statement"] = preg_replace('~^.+\\s+AS\\s+~isU', '', $I["text"]);
        return $I;
    }
    function triggers($P)
    {
        $I = array();
        foreach (get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = " . q($P)) as $J)
            $I[$J["name"]] = array(
                $J["Timing"],
                $J["Event"]
            );
        return $I;
    }
    function trigger_options()
    {
        return array(
            "Timing" => array(
                "AFTER",
                "INSTEAD OF"
            ),
            "Type" => array(
                "AS"
            )
        );
    }
    function schemas()
    {
        return get_vals("SELECT name FROM sys.schemas");
    }
    function get_schema()
    {
        global $i;
        if ($_GET["ns"] != "")
            return $_GET["ns"];
        return $i->result("SELECT SCHEMA_NAME()");
    }
    function set_schema($yf)
    {
        return true;
    }
    function use_sql($qb)
    {
        return "USE " . idf_escape($qb);
    }
    function show_variables()
    {
        return array();
    }
    function show_status()
    {
        return array();
    }
    function convert_field($o)
    {
    }
    function unconvert_field($o, $I)
    {
        return $I;
    }
    function support($mc)
    {
        return ereg('^(scheme|trigger|view|drop_col)$', $mc);
    }
    $w  = "mssql";
    $U  = array();
    $Qf = array();
    foreach (array(
        lang(14) => array(
            "tinyint" => 3,
            "smallint" => 5,
            "int" => 10,
            "bigint" => 20,
            "bit" => 1,
            "decimal" => 0,
            "real" => 12,
            "float" => 53,
            "smallmoney" => 10,
            "money" => 20
        ),
        lang(15) => array(
            "date" => 10,
            "smalldatetime" => 19,
            "datetime" => 19,
            "datetime2" => 19,
            "time" => 8,
            "datetimeoffset" => 10
        ),
        lang(16) => array(
            "char" => 8000,
            "varchar" => 8000,
            "text" => 2147483647,
            "nchar" => 4000,
            "nvarchar" => 4000,
            "ntext" => 1073741823
        ),
        lang(17) => array(
            "binary" => 8000,
            "varbinary" => 8000,
            "image" => 2147483647
        )
    ) as $x => $X) {
        $U += $X;
        $Qf[$x] = array_keys($X);
    }
    $Kg = array();
    $le = array(
        "=",
        "<",
        ">",
        "<=",
        ">=",
        "!=",
        "LIKE",
        "LIKE %%",
        "IN",
        "IS NULL",
        "NOT LIKE",
        "NOT IN",
        "IS NOT NULL"
    );
    $Cc = array(
        "len",
        "lower",
        "round",
        "upper"
    );
    $Hc = array(
        "avg",
        "count",
        "count distinct",
        "max",
        "min",
        "sum"
    );
    $Lb = array(
        array(
            "date|time" => "getdate"
        ),
        array(
            "int|decimal|real|float|money|datetime" => "+/-",
            "char|text" => "+"
        )
    );
}
$Eb = array(
    "server" => "MySQL"
) + $Eb;
if (!defined("DRIVER")) {
    $Ne = array(
        "MySQLi",
        "MySQL",
        "PDO_MySQL"
    );
    define("DRIVER", "server");
    if (extension_loaded("mysqli")) {
        class Min_DB extends MySQLi
        {
            var $extension = "MySQLi";
            function Min_DB()
            {
                parent::init();
            }
            function connect($M, $V, $E)
            {
                mysqli_report(MYSQLI_REPORT_OFF);
                list($Mc, $Je) = explode(":", $M, 2);
                $I = @$this->real_connect(($M != "" ? $Mc : ini_get("mysqli.default_host")), ($M . $V != "" ? $V : ini_get("mysqli.default_user")), ($M . $V . $E != "" ? $E : ini_get("mysqli.default_pw")), null, (is_numeric($Je) ? $Je : ini_get("mysqli.default_port")), (!is_numeric($Je) ? $Je : null));
                if ($I) {
                    if (method_exists($this, 'set_charset'))
                        $this->set_charset("utf8");
                    else
                        $this->query("SET NAMES utf8");
                }
                return $I;
            }
            function result($G, $o = 0)
            {
                $H = $this->query($G);
                if (!$H)
                    return false;
                $J = $H->fetch_array();
                return $J[$o];
            }
            function quote($O)
            {
                return "'" . $this->escape_string($O) . "'";
            }
        }
    } elseif (extension_loaded("mysql") && !(ini_get("sql.safe_mode") && extension_loaded("pdo_mysql"))) {
        class Min_DB
        {
            var $extension = "MySQL", $server_info, $affected_rows, $errno, $error, $_link, $_result;
            function connect($M, $V, $E)
            {
                $this->_link = @mysql_connect(($M != "" ? $M : ini_get("mysql.default_host")), ("$M$V" != "" ? $V : ini_get("mysql.default_user")), ("$M$V$E" != "" ? $E : ini_get("mysql.default_password")), true, 131072);
                if ($this->_link) {
                    $this->server_info = mysql_get_server_info($this->_link);
                    if (function_exists('mysql_set_charset'))
                        mysql_set_charset("utf8", $this->_link);
                    else
                        $this->query("SET NAMES utf8");
                } else
                    $this->error = mysql_error();
                return (bool) $this->_link;
            }
            function quote($O)
            {
                return "'" . mysql_real_escape_string($O, $this->_link) . "'";
            }
            function select_db($qb)
            {
                return mysql_select_db($qb, $this->_link);
            }
            function query($G, $Eg = false)
            {
                $H           = @($Eg ? mysql_unbuffered_query($G, $this->_link) : mysql_query($G, $this->_link));
                $this->error = "";
                if (!$H) {
                    $this->errno = mysql_errno($this->_link);
                    $this->error = mysql_error($this->_link);
                    return false;
                }
                if ($H === true) {
                    $this->affected_rows = mysql_affected_rows($this->_link);
                    $this->info          = mysql_info($this->_link);
                    return true;
                }
                return new Min_Result($H);
            }
            function multi_query($G)
            {
                return $this->_result = $this->query($G);
            }
            function store_result()
            {
                return $this->_result;
            }
            function next_result()
            {
                return false;
            }
            function result($G, $o = 0)
            {
                $H = $this->query($G);
                if (!$H || !$H->num_rows)
                    return false;
                return mysql_result($H->_result, 0, $o);
            }
        }
        class Min_Result
        {
            var $num_rows, $_result, $_offset = 0;
            function Min_Result($H)
            {
                $this->_result  = $H;
                $this->num_rows = mysql_num_rows($H);
            }
            function fetch_assoc()
            {
                return mysql_fetch_assoc($this->_result);
            }
            function fetch_row()
            {
                return mysql_fetch_row($this->_result);
            }
            function fetch_field()
            {
                $I            = mysql_fetch_field($this->_result, $this->_offset++);
                $I->orgtable  = $I->table;
                $I->orgname   = $I->name;
                $I->charsetnr = ($I->blob ? 63 : 0);
                return $I;
            }
            function __destruct()
            {
                mysql_free_result($this->_result);
            }
        }
    } elseif (extension_loaded("pdo_mysql")) {
        class Min_DB extends Min_PDO
        {
            var $extension = "PDO_MySQL";
            function connect($M, $V, $E)
            {
                $this->dsn("mysql:host=" . str_replace(":", ";unix_socket=", preg_replace('~:(\\d)~', ';port=\\1', $M)), $V, $E);
                $this->query("SET NAMES utf8");
                return true;
            }
            function select_db($qb)
            {
                return $this->query("USE " . idf_escape($qb));
            }
            function query($G, $Eg = false)
            {
                $this->setAttribute(1000, !$Eg);
                return parent::query($G, $Eg);
            }
        }
    }
    function idf_escape($t)
    {
        return "`" . str_replace("`", "``", $t) . "`";
    }
    function table($t)
    {
        return idf_escape($t);
    }
    function connect()
    {
        global $b;
        $i  = new Min_DB;
        $mb = $b->credentials();
        if ($i->connect($mb[0], $mb[1], $mb[2])) {
            $i->query("SET sql_quote_show_create = 1, autocommit = 1");
            return $i;
        }
        $I = $i->error;
        if (function_exists('iconv') && !is_utf8($I) && strlen($wf = iconv("windows-1250", "utf-8", $I)) > strlen($I))
            $I = $wf;
        return $I;
    }
    function get_databases($sc)
    {
        global $i;
        $I = get_session("dbs");
        if ($I === null) {
            $G = ($i->server_info >= 5 ? "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA" : "SHOW DATABASES");
            $I = ($sc ? slow_query($G) : get_vals($G));
            restart_session();
            set_session("dbs", $I);
            stop_session();
        }
        return $I;
    }
    function limit($G, $Z, $y, $C = 0, $Cf = " ")
    {
        return " $G$Z" . ($y !== null ? $Cf . "LIMIT $y" . ($C ? " OFFSET $C" : "") : "");
    }
    function limit1($G, $Z)
    {
        return limit($G, $Z, 1);
    }
    function db_collation($m, $Xa)
    {
        global $i;
        $I = null;
        $k = $i->result("SHOW CREATE DATABASE " . idf_escape($m), 1);
        if (preg_match('~ COLLATE ([^ ]+)~', $k, $A))
            $I = $A[1];
        elseif (preg_match('~ CHARACTER SET ([^ ]+)~', $k, $A))
            $I = $Xa[$A[1]][-1];
        return $I;
    }
    function engines()
    {
        $I = array();
        foreach (get_rows("SHOW ENGINES") as $J) {
            if (ereg("YES|DEFAULT", $J["Support"]))
                $I[] = $J["Engine"];
        }
        return $I;
    }
    function logged_user()
    {
        global $i;
        return $i->result("SELECT USER()");
    }
    function tables_list()
    {
        global $i;
        return get_key_vals("SHOW" . ($i->server_info >= 5 ? " FULL" : "") . " TABLES");
    }
    function count_tables($l)
    {
        $I = array();
        foreach ($l as $m)
            $I[$m] = count(get_vals("SHOW TABLES IN " . idf_escape($m)));
        return $I;
    }
    function table_status($B = "", $lc = false)
    {
        global $i;
        $I = array();
        foreach (get_rows($lc && $i->server_info >= 5 ? "SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() " . ($B != "" ? "AND TABLE_NAME = " . q($B) : "ORDER BY Name") : "SHOW TABLE STATUS" . ($B != "" ? " LIKE " . q(addcslashes($B, "%_\\")) : "")) as $J) {
            if ($J["Engine"] == "InnoDB")
                $J["Comment"] = preg_replace('~(?:(.+); )?InnoDB free: .*~', '\\1', $J["Comment"]);
            if (!isset($J["Engine"]))
                $J["Comment"] = "";
            if ($B != "")
                return $J;
            $I[$J["Name"]] = $J;
        }
        return $I;
    }
    function is_view($Q)
    {
        return $Q["Engine"] === null;
    }
    function fk_support($Q)
    {
        return eregi("InnoDB|IBMDB2I", $Q["Engine"]);
    }
    function fields($P)
    {
        $I = array();
        foreach (get_rows("SHOW FULL COLUMNS FROM " . table($P)) as $J) {
            preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~', $J["Type"], $A);
            $I[$J["Field"]] = array(
                "field" => $J["Field"],
                "full_type" => $J["Type"],
                "type" => $A[1],
                "length" => $A[2],
                "unsigned" => ltrim($A[3] . $A[4]),
                "default" => ($J["Default"] != "" || ereg("char|set", $A[1]) ? $J["Default"] : null),
                "null" => ($J["Null"] == "YES"),
                "auto_increment" => ($J["Extra"] == "auto_increment"),
                "on_update" => (eregi('^on update (.+)', $J["Extra"], $A) ? $A[1] : ""),
                "collation" => $J["Collation"],
                "privileges" => array_flip(explode(",", $J["Privileges"])),
                "comment" => $J["Comment"],
                "primary" => ($J["Key"] == "PRI")
            );
        }
        return $I;
    }
    function indexes($P, $j = null)
    {
        $I = array();
        foreach (get_rows("SHOW INDEX FROM " . table($P), $j) as $J) {
            $I[$J["Key_name"]]["type"]      = ($J["Key_name"] == "PRIMARY" ? "PRIMARY" : ($J["Index_type"] == "FULLTEXT" ? "FULLTEXT" : ($J["Non_unique"] ? "INDEX" : "UNIQUE")));
            $I[$J["Key_name"]]["columns"][] = $J["Column_name"];
            $I[$J["Key_name"]]["lengths"][] = $J["Sub_part"];
            $I[$J["Key_name"]]["descs"][]   = null;
        }
        return $I;
    }
    function foreign_keys($P)
    {
        global $i, $he;
        static $He = '`(?:[^`]|``)+`';
        $I  = array();
        $kb = $i->result("SHOW CREATE TABLE " . table($P), 1);
        if ($kb) {
            preg_match_all("~CONSTRAINT ($He) FOREIGN KEY \\(((?:$He,? ?)+)\\) REFERENCES ($He)(?:\\.($He))? \\(((?:$He,? ?)+)\\)(?: ON DELETE ($he))?(?: ON UPDATE ($he))?~", $kb, $Bd, PREG_SET_ORDER);
            foreach ($Bd as $A) {
                preg_match_all("~$He~", $A[2], $If);
                preg_match_all("~$He~", $A[5], $fg);
                $I[idf_unescape($A[1])] = array(
                    "db" => idf_unescape($A[4] != "" ? $A[3] : $A[4]),
                    "table" => idf_unescape($A[4] != "" ? $A[4] : $A[3]),
                    "source" => array_map('idf_unescape', $If[0]),
                    "target" => array_map('idf_unescape', $fg[0]),
                    "on_delete" => ($A[6] ? $A[6] : "RESTRICT"),
                    "on_update" => ($A[7] ? $A[7] : "RESTRICT")
                );
            }
        }
        return $I;
    }
    function view($B)
    {
        global $i;
        return array(
            "select" => preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU', '', $i->result("SHOW CREATE VIEW " . table($B), 1))
        );
    }
    function collations()
    {
        $I = array();
        foreach (get_rows("SHOW COLLATION") as $J) {
            if ($J["Default"])
                $I[$J["Charset"]][-1] = $J["Collation"];
            else
                $I[$J["Charset"]][] = $J["Collation"];
        }
        ksort($I);
        foreach ($I as $x => $X)
            asort($I[$x]);
        return $I;
    }
    function information_schema($m)
    {
        global $i;
        return ($i->server_info >= 5 && $m == "information_schema") || ($i->server_info >= 5.5 && $m == "performance_schema");
    }
    function error()
    {
        global $i;
        return h(preg_replace('~^You have an error.*syntax to use~U', "Syntax error", $i->error));
    }
    function error_line()
    {
        global $i;
        if (ereg(' at line ([0-9]+)$', $i->error, $jf))
            return $jf[1] - 1;
    }
    function create_database($m, $e)
    {
        set_session("dbs", null);
        return queries("CREATE DATABASE " . idf_escape($m) . ($e ? " COLLATE " . q($e) : ""));
    }
    function drop_databases($l)
    {
        restart_session();
        set_session("dbs", null);
        return apply_queries("DROP DATABASE", $l, 'idf_escape');
    }
    function rename_database($B, $e)
    {
        if (create_database($B, $e)) {
            $lf = array();
            foreach (tables_list() as $P => $T)
                $lf[] = table($P) . " TO " . idf_escape($B) . "." . table($P);
            if (!$lf || queries("RENAME TABLE " . implode(", ", $lf))) {
                queries("DROP DATABASE " . idf_escape(DB));
                return true;
            }
        }
        return false;
    }
    function auto_increment()
    {
        $Ba = " PRIMARY KEY";
        if ($_GET["create"] != "" && $_POST["auto_increment_col"]) {
            foreach (indexes($_GET["create"]) as $u) {
                if (in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"], $u["columns"], true)) {
                    $Ba = "";
                    break;
                }
                if ($u["type"] == "PRIMARY")
                    $Ba = " UNIQUE";
            }
        }
        return " AUTO_INCREMENT$Ba";
    }
    function alter_table($P, $B, $p, $tc, $bb, $Tb, $e, $Aa, $Ee)
    {
        $c = array();
        foreach ($p as $o)
            $c[] = ($o[1] ? ($P != "" ? ($o[0] != "" ? "CHANGE " . idf_escape($o[0]) : "ADD") : " ") . " " . implode($o[1]) . ($P != "" ? $o[2] : "") : "DROP " . idf_escape($o[0]));
        $c  = array_merge($c, $tc);
        $Nf = "COMMENT=" . q($bb) . ($Tb ? " ENGINE=" . q($Tb) : "") . ($e ? " COLLATE " . q($e) : "") . ($Aa != "" ? " AUTO_INCREMENT=$Aa" : "") . $Ee;
        if ($P == "")
            return queries("CREATE TABLE " . table($B) . " (\n" . implode(",\n", $c) . "\n) $Nf");
        if ($P != $B)
            $c[] = "RENAME TO " . table($B);
        $c[] = $Nf;
        return queries("ALTER TABLE " . table($P) . "\n" . implode(",\n", $c));
    }
    function alter_indexes($P, $c)
    {
        foreach ($c as $x => $X)
            $c[$x] = ($X[2] == "DROP" ? "\nDROP INDEX " . idf_escape($X[1]) : "\nADD $X[0] " . ($X[0] == "PRIMARY" ? "KEY " : "") . ($X[1] != "" ? idf_escape($X[1]) . " " : "") . $X[2]);
        return queries("ALTER TABLE " . table($P) . implode(",", $c));
    }
    function truncate_tables($R)
    {
        return apply_queries("TRUNCATE TABLE", $R);
    }
    function drop_views($Wg)
    {
        return queries("DROP VIEW " . implode(", ", array_map('table', $Wg)));
    }
    function drop_tables($R)
    {
        return queries("DROP TABLE " . implode(", ", array_map('table', $R)));
    }
    function move_tables($R, $Wg, $fg)
    {
        $lf = array();
        foreach (array_merge($R, $Wg) as $P)
            $lf[] = table($P) . " TO " . idf_escape($fg) . "." . table($P);
        return queries("RENAME TABLE " . implode(", ", $lf));
    }
    function copy_tables($R, $Wg, $fg)
    {
        queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");
        foreach ($R as $P) {
            $B = ($fg == DB ? table("copy_$P") : idf_escape($fg) . "." . table($P));
            if (!queries("DROP TABLE IF EXISTS $B") || !queries("CREATE TABLE $B LIKE " . table($P)) || !queries("INSERT INTO $B SELECT * FROM " . table($P)))
                return false;
        }
        foreach ($Wg as $P) {
            $B  = ($fg == DB ? table("copy_$P") : idf_escape($fg) . "." . table($P));
            $Vg = view($P);
            if (!queries("DROP VIEW IF EXISTS $B") || !queries("CREATE VIEW $B AS $Vg[select]"))
                return false;
        }
        return true;
    }
    function trigger($B)
    {
        if ($B == "")
            return array();
        $K = get_rows("SHOW TRIGGERS WHERE `Trigger` = " . q($B));
        return reset($K);
    }
    function triggers($P)
    {
        $I = array();
        foreach (get_rows("SHOW TRIGGERS LIKE " . q(addcslashes($P, "%_\\"))) as $J)
            $I[$J["Trigger"]] = array(
                $J["Timing"],
                $J["Event"]
            );
        return $I;
    }
    function trigger_options()
    {
        return array(
            "Timing" => array(
                "BEFORE",
                "AFTER"
            ),
            "Type" => array(
                "FOR EACH ROW"
            )
        );
    }
    function routine($B, $T)
    {
        global $i, $Vb, $Yc, $U;
        $va = array(
            "bool",
            "boolean",
            "integer",
            "double precision",
            "real",
            "dec",
            "numeric",
            "fixed",
            "national char",
            "national varchar"
        );
        $Dg = "((" . implode("|", array_merge(array_keys($U), $va)) . ")\\b(?:\\s*\\(((?:[^'\")]*|$Vb)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";
        $He = "\\s*(" . ($T == "FUNCTION" ? "" : $Yc) . ")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Dg";
        $k  = $i->result("SHOW CREATE $T " . idf_escape($B), 2);
        preg_match("~\\(((?:$He\\s*,?)*)\\)\\s*" . ($T == "FUNCTION" ? "RETURNS\\s+$Dg\\s+" : "") . "(.*)~is", $k, $A);
        $p = array();
        preg_match_all("~$He\\s*,?~is", $A[1], $Bd, PREG_SET_ORDER);
        foreach ($Bd as $_e) {
            $B   = str_replace("``", "`", $_e[2]) . $_e[3];
            $p[] = array(
                "field" => $B,
                "type" => strtolower($_e[5]),
                "length" => preg_replace_callback("~$Vb~s", 'normalize_enum', $_e[6]),
                "unsigned" => strtolower(preg_replace('~\\s+~', ' ', trim("$_e[8] $_e[7]"))),
                "null" => 1,
                "full_type" => $_e[4],
                "inout" => strtoupper($_e[1]),
                "collation" => strtolower($_e[9])
            );
        }
        if ($T != "FUNCTION")
            return array(
                "fields" => $p,
                "definition" => $A[11]
            );
        return array(
            "fields" => $p,
            "returns" => array(
                "type" => $A[12],
                "length" => $A[13],
                "unsigned" => $A[15],
                "collation" => $A[16]
            ),
            "definition" => $A[17],
            "language" => "SQL"
        );
    }
    function routines()
    {
        return get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = " . q(DB));
    }
    function routine_languages()
    {
        return array();
    }
    function begin()
    {
        return queries("BEGIN");
    }
    function insert_into($P, $N)
    {
        return queries("INSERT INTO " . table($P) . " (" . implode(", ", array_keys($N)) . ")\nVALUES (" . implode(", ", $N) . ")");
    }
    function insert_update($P, $N, $Qe)
    {
        foreach ($N as $x => $X)
            $N[$x] = "$x = $X";
        $Lg = implode(", ", $N);
        return queries("INSERT INTO " . table($P) . " SET $Lg ON DUPLICATE KEY UPDATE $Lg");
    }
    function last_id()
    {
        global $i;
        return $i->result("SELECT LAST_INSERT_ID()");
    }
    function explain($i, $G)
    {
        return $i->query("EXPLAIN " . ($i->server_info >= 5.1 ? "PARTITIONS " : "") . $G);
    }
    function found_rows($Q, $Z)
    {
        return ($Z || $Q["Engine"] != "InnoDB" ? null : $Q["Rows"]);
    }
    function types()
    {
        return array();
    }
    function schemas()
    {
        return array();
    }
    function get_schema()
    {
        return "";
    }
    function set_schema($yf)
    {
        return true;
    }
    function create_sql($P, $Aa)
    {
        global $i;
        $I = $i->result("SHOW CREATE TABLE " . table($P), 1);
        if (!$Aa)
            $I = preg_replace('~ AUTO_INCREMENT=\\d+~', '', $I);
        return $I;
    }
    function truncate_sql($P)
    {
        return "TRUNCATE " . table($P);
    }
    function use_sql($qb)
    {
        return "USE " . idf_escape($qb);
    }
    function trigger_sql($P, $Rf)
    {
        $I = "";
        foreach (get_rows("SHOW TRIGGERS LIKE " . q(addcslashes($P, "%_\\")), null, "-- ") as $J)
            $I .= "\n" . ($Rf == 'CREATE+ALTER' ? "DROP TRIGGER IF EXISTS " . idf_escape($J["Trigger"]) . ";;\n" : "") . "CREATE TRIGGER " . idf_escape($J["Trigger"]) . " $J[Timing] $J[Event] ON " . table($J["Table"]) . " FOR EACH ROW\n$J[Statement];;\n";
        return $I;
    }
    function show_variables()
    {
        return get_key_vals("SHOW VARIABLES");
    }
    function process_list()
    {
        return get_rows("SHOW FULL PROCESSLIST");
    }
    function show_status()
    {
        return get_key_vals("SHOW STATUS");
    }
    function convert_field($o)
    {
        if (ereg("binary", $o["type"]))
            return "HEX(" . idf_escape($o["field"]) . ")";
        if ($o["type"] == "bit")
            return "BIN(" . idf_escape($o["field"]) . " + 0)";
        if (ereg("geometry|point|linestring|polygon", $o["type"]))
            return "AsWKT(" . idf_escape($o["field"]) . ")";
    }
    function unconvert_field($o, $I)
    {
        if (ereg("binary", $o["type"]))
            $I = "UNHEX($I)";
        if ($o["type"] == "bit")
            $I = "CONV($I, 2, 10) + 0";
        if (ereg("geometry|point|linestring|polygon", $o["type"]))
            $I = "GeomFromText($I)";
        return $I;
    }
    function support($mc)
    {
        global $i;
        return !ereg("scheme|sequence|type" . ($i->server_info < 5.1 ? "|event|partitioning" . ($i->server_info < 5 ? "|view|routine|trigger" : "") : ""), $mc);
    }
    $w  = "sql";
    $U  = array();
    $Qf = array();
    foreach (array(
        lang(14) => array(
            "tinyint" => 3,
            "smallint" => 5,
            "mediumint" => 8,
            "int" => 10,
            "bigint" => 20,
            "decimal" => 66,
            "float" => 12,
            "double" => 21
        ),
        lang(15) => array(
            "date" => 10,
            "datetime" => 19,
            "timestamp" => 19,
            "time" => 10,
            "year" => 4
        ),
        lang(16) => array(
            "char" => 255,
            "varchar" => 65535,
            "tinytext" => 255,
            "text" => 65535,
            "mediumtext" => 16777215,
            "longtext" => 4294967295
        ),
        lang(20) => array(
            "enum" => 65535,
            "set" => 64
        ),
        lang(17) => array(
            "bit" => 20,
            "binary" => 255,
            "varbinary" => 65535,
            "tinyblob" => 255,
            "blob" => 65535,
            "mediumblob" => 16777215,
            "longblob" => 4294967295
        ),
        lang(19) => array(
            "geometry" => 0,
            "point" => 0,
            "linestring" => 0,
            "polygon" => 0,
            "multipoint" => 0,
            "multilinestring" => 0,
            "multipolygon" => 0,
            "geometrycollection" => 0
        )
    ) as $x => $X) {
        $U += $X;
        $Qf[$x] = array_keys($X);
    }
    $Kg = array(
        "unsigned",
        "zerofill",
        "unsigned zerofill"
    );
    $le = array(
        "=",
        "<",
        ">",
        "<=",
        ">=",
        "!=",
        "LIKE",
        "LIKE %%",
        "REGEXP",
        "IN",
        "IS NULL",
        "NOT LIKE",
        "NOT REGEXP",
        "NOT IN",
        "IS NOT NULL",
        "SQL"
    );
    $Cc = array(
        "char_length",
        "date",
        "from_unixtime",
        "lower",
        "round",
        "sec_to_time",
        "time_to_sec",
        "upper"
    );
    $Hc = array(
        "avg",
        "count",
        "count distinct",
        "group_concat",
        "max",
        "min",
        "sum"
    );
    $Lb = array(
        array(
            "char" => "md5/sha1/password/encrypt/uuid",
            "binary" => "md5/sha1",
            "date|time" => "now"
        ),
        array(
            "(^|[^o])int|float|double|decimal" => "+/-",
            "date" => "+ interval/- interval",
            "time" => "addtime/subtime",
            "char|text" => "concat"
        )
    );
}
define("SERVER", $_GET[DRIVER]);
define("DB", $_GET["db"]);
define("ME", preg_replace('~^[^?]*/([^?]*).*~', '\\1', $_SERVER["REQUEST_URI"]) . '?' . (sid() ? SID . '&' : '') . (SERVER !== null ? DRIVER . "=" . urlencode(SERVER) . '&' : '') . (isset($_GET["username"]) ? "username=" . urlencode($_GET["username"]) . '&' : '') . (DB != "" ? 'db=' . urlencode(DB) . '&' . (isset($_GET["ns"]) ? "ns=" . urlencode($_GET["ns"]) . "&" : "") : ''));
$ia = "3.7.1";
class Adminer
{
    var $operators;
    function name()
    {
        return "<a href='http://www.adminer.org/' id='h1'>Adminer</a>";
    }
    function credentials()
    {
        return array(
            SERVER,
            $_GET["username"],
            get_session("pwds")
        );
    }
    function permanentLogin($k = false)
    {
        return password_file($k);
    }
    function database()
    {
        return DB;
    }
    function databases($sc = true)
    {
        return get_databases($sc);
    }
    function queryTimeout()
    {
        return 5;
    }
    function headers()
    {
        return true;
    }
    function head()
    {
        return true;
    }
    function loginForm()
    {
        global $Eb;
        echo '<table cellspacing="0">
<tr><th>', lang(21), '<td>', html_select("auth[driver]", $Eb, DRIVER, "loginDriver(this);"), '<tr><th>', lang(22), '<td><input name="auth[server]" value="', h(SERVER), '" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>', lang(23), '<td><input name="auth[username]" id="username" value="', h($_GET["username"]), '" autocapitalize="off">
<tr><th>', lang(24), '<td><input type="password" name="auth[password]">
<tr><th>', lang(25), '<td><input name="auth[db]" value="', h($_GET["db"]);
?>" autocapitalize="off">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
focus(username);
username.form['auth[driver]'].onchange();
</script>
<?php
        
        echo "<p><input type='submit' value='" . lang(26) . "'>\n", checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang(27)) . "\n";
    }
    function login($zd, $E)
    {
        return true;
    }
    function tableName($Xf)
    {
        return h($Xf["Name"]);
    }
    function fieldName($o, $pe = 0)
    {
        return '<span title="' . h($o["full_type"]) . '">' . h($o["field"]) . '</span>';
    }
    function selectLinks($Xf, $N = "")
    {
        echo '<p class="tabs">';
        $yd = array(
            "select" => lang(28),
            "table" => lang(29)
        );
        if (is_view($Xf))
            $yd["view"] = lang(30);
        else
            $yd["create"] = lang(31);
        if ($N !== null)
            $yd["edit"] = lang(32);
        foreach ($yd as $x => $X)
            echo " <a href='" . h(ME) . "$x=" . urlencode($Xf["Name"]) . ($x == "edit" ? $N : "") . "'" . bold(isset($_GET[$x])) . ">$X</a>";
        echo "\n";
    }
    function foreignKeys($P)
    {
        return foreign_keys($P);
    }
    function backwardKeys($P, $Wf)
    {
        return array();
    }
    function backwardKeysPrint($Da, $J)
    {
    }
    function selectQuery($G)
    {
        global $w, $S;
        return "<form action='" . h(ME) . "sql=' method='post'><p><span onclick=\"return !selectEditSql(event, this, '" . lang(33) . "');\">" . "<code class='jush-$w'>" . h(str_replace("\n", " ", $G)) . "</code>" . " <a href='" . h(ME) . "sql=" . urlencode($G) . "'>" . lang(34) . "</a>" . "</span><input type='hidden' name='token' value='$S'></p></form>\n";
    }
    function rowDescription($P)
    {
        return "";
    }
    function rowDescriptions($K, $uc)
    {
        return $K;
    }
    function selectLink($X, $o)
    {
    }
    function selectVal($X, $z, $o)
    {
        $I = ($X === null ? "<i>NULL</i>" : (ereg("char|binary", $o["type"]) && !ereg("var", $o["type"]) ? "<code>$X</code>" : $X));
        if (ereg('blob|bytea|raw|file', $o["type"]) && !is_utf8($X))
            $I = lang(35, strlen(html_entity_decode($X, ENT_QUOTES)));
        return ($z ? "<a href='" . h($z) . "'>$I</a>" : $I);
    }
    function editVal($X, $o)
    {
        return $X;
    }
    function selectColumnsPrint($L, $g)
    {
        global $Cc, $Hc;
        print_fieldset("select", lang(36), $L);
        $s  = 0;
        $Ac = array(
            lang(37) => $Cc,
            lang(38) => $Hc
        );
        foreach ($L as $x => $X) {
            $X = $_GET["columns"][$x];
            echo "<div>" . html_select("columns[$s][fun]", array(
                -1 => ""
            ) + $Ac, $X["fun"]), "(<select name='columns[$s][col]' onchange='selectFieldChange(this.form);'><option>" . optionlist($g, $X["col"], true) . "</select>)</div>\n";
            $s++;
        }
        echo "<div>" . html_select("columns[$s][fun]", array(
            -1 => ""
        ) + $Ac, "", "this.nextSibling.nextSibling.onchange();"), "(<select name='columns[$s][col]' onchange='selectAddRow(this);'><option>" . optionlist($g, null, true) . "</select>)</div>\n", "</div></fieldset>\n";
    }
    function selectSearchPrint($Z, $g, $v)
    {
        print_fieldset("search", lang(39), $Z);
        foreach ($v as $s => $u) {
            if ($u["type"] == "FULLTEXT") {
                echo "(<i>" . implode("</i>, <i>", array_map('h', $u["columns"])) . "</i>) AGAINST", " <input type='search' name='fulltext[$s]' value='" . h($_GET["fulltext"][$s]) . "' onchange='selectFieldChange(this.form);'>", checkbox("boolean[$s]", 1, isset($_GET["boolean"][$s]), "BOOL"), "<br>\n";
            }
        }
        $_GET["where"] = (array) $_GET["where"];
        reset($_GET["where"]);
        $Na = "this.nextSibling.onchange();";
        for ($s = 0; $s <= count($_GET["where"]); $s++) {
            list(, $X) = each($_GET["where"]);
            if (!$X || ("$X[col]$X[val]" != "" && in_array($X["op"], $this->operators))) {
                echo "<div><select name='where[$s][col]' onchange='$Na'><option value=''>(" . lang(40) . ")" . optionlist($g, $X["col"], true) . "</select>", html_select("where[$s][op]", $this->operators, $X["op"], $Na), "<input type='search' name='where[$s][val]' value='" . h($X["val"]) . "' onchange='" . ($X ? "selectFieldChange(this.form)" : "selectAddRow(this)") . ";' onsearch='selectSearchSearch(this);'></div>\n";
            }
        }
        echo "</div></fieldset>\n";
    }
    function selectOrderPrint($pe, $g, $v)
    {
        print_fieldset("sort", lang(41), $pe);
        $s = 0;
        foreach ((array) $_GET["order"] as $x => $X) {
            if (isset($g[$X])) {
                echo "<div><select name='order[$s]' onchange='selectFieldChange(this.form);'><option>" . optionlist($g, $X, true) . "</select>", checkbox("desc[$s]", 1, isset($_GET["desc"][$x]), lang(42)) . "</div>\n";
                $s++;
            }
        }
        echo "<div><select name='order[$s]' onchange='selectAddRow(this);'><option>" . optionlist($g, null, true) . "</select>", checkbox("desc[$s]", 1, false, lang(42)) . "</div>\n", "</div></fieldset>\n";
    }
    function selectLimitPrint($y)
    {
        echo "<fieldset><legend>" . lang(43) . "</legend><div>";
        echo "<input type='number' name='limit' class='size' value='" . h($y) . "' onchange='selectFieldChange(this.form);'>", "</div></fieldset>\n";
    }
    function selectLengthPrint($kg)
    {
        if ($kg !== null) {
            echo "<fieldset><legend>" . lang(44) . "</legend><div>", "<input type='number' name='text_length' class='size' value='" . h($kg) . "'>", "</div></fieldset>\n";
        }
    }
    function selectActionPrint($v)
    {
        echo "<fieldset><legend>" . lang(45) . "</legend><div>", "<input type='submit' value='" . lang(36) . "'>", " <span id='noindex' title='" . lang(46) . "'></span>", "<script type='text/javascript'>\n", "var indexColumns = ";
        $g = array();
        foreach ($v as $u) {
            if ($u["type"] != "FULLTEXT")
                $g[reset($u["columns"])] = 1;
        }
        $g[""] = 1;
        foreach ($g as $x => $X)
            json_row($x);
        echo ";\n", "selectFieldChange(document.getElementById('form'));\n", "</script>\n", "</div></fieldset>\n";
    }
    function selectCommandPrint()
    {
        return !information_schema(DB);
    }
    function selectImportPrint()
    {
        return !information_schema(DB);
    }
    function selectEmailPrint($Pb, $g)
    {
    }
    function selectColumnsProcess($g, $v)
    {
        global $Cc, $Hc;
        $L  = array();
        $Fc = array();
        foreach ((array) $_GET["columns"] as $x => $X) {
            if ($X["fun"] == "count" || (isset($g[$X["col"]]) && (!$X["fun"] || in_array($X["fun"], $Cc) || in_array($X["fun"], $Hc)))) {
                $L[$x] = apply_sql_function($X["fun"], (isset($g[$X["col"]]) ? idf_escape($X["col"]) : "*"));
                if (!in_array($X["fun"], $Hc))
                    $Fc[] = $L[$x];
            }
        }
        return array(
            $L,
            $Fc
        );
    }
    function selectSearchProcess($p, $v)
    {
        global $w;
        $I = array();
        foreach ($v as $s => $u) {
            if ($u["type"] == "FULLTEXT" && $_GET["fulltext"][$s] != "")
                $I[] = "MATCH (" . implode(", ", array_map('idf_escape', $u["columns"])) . ") AGAINST (" . q($_GET["fulltext"][$s]) . (isset($_GET["boolean"][$s]) ? " IN BOOLEAN MODE" : "") . ")";
        }
        foreach ((array) $_GET["where"] as $X) {
            if ("$X[col]$X[val]" != "" && in_array($X["op"], $this->operators)) {
                $db = " $X[op]";
                if (ereg('IN$', $X["op"])) {
                    $Rc = process_length($X["val"]);
                    $db .= " (" . ($Rc != "" ? $Rc : "NULL") . ")";
                } elseif ($X["op"] == "SQL")
                    $db = " $X[val]";
                elseif ($X["op"] == "LIKE %%")
                    $db = " LIKE " . $this->processInput($p[$X["col"]], "%$X[val]%");
                elseif (!ereg('NULL$', $X["op"]))
                    $db .= " " . $this->processInput($p[$X["col"]], $X["val"]);
                if ($X["col"] != "")
                    $I[] = idf_escape($X["col"]) . $db;
                else {
                    $Ya = array();
                    foreach ($p as $B => $o) {
                        $ed = ereg('char|text|enum|set', $o["type"]);
                        if ((is_numeric($X["val"]) || !ereg('(^|[^o])int|float|double|decimal|bit', $o["type"])) && (!ereg("[\x80-\xFF]", $X["val"]) || $ed)) {
                            $B    = idf_escape($B);
                            $Ya[] = ($w == "sql" && $ed && !ereg('^utf8', $o["collation"]) ? "CONVERT($B USING utf8)" : $B);
                        }
                    }
                    $I[] = ($Ya ? "(" . implode("$db OR ", $Ya) . "$db)" : "0");
                }
            }
        }
        return $I;
    }
    function selectOrderProcess($p, $v)
    {
        $I = array();
        foreach ((array) $_GET["order"] as $x => $X) {
            if (isset($p[$X]) || preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~', $X))
                $I[] = (isset($p[$X]) ? idf_escape($X) : $X) . (isset($_GET["desc"][$x]) ? " DESC" : "");
        }
        return $I;
    }
    function selectLimitProcess()
    {
        return (isset($_GET["limit"]) ? $_GET["limit"] : "50");
    }
    function selectLengthProcess()
    {
        return (isset($_GET["text_length"]) ? $_GET["text_length"] : "100");
    }
    function selectEmailProcess($Z, $uc)
    {
        return false;
    }
    function selectQueryBuild($L, $Z, $Fc, $pe, $y, $D)
    {
        return "";
    }
    function messageQuery($G)
    {
        global $w;
        restart_session();
        $Kc =& get_session("queries");
        $Oc = "sql-" . count($Kc[$_GET["db"]]);
        if (strlen($G) > 1e6)
            $G = ereg_replace('[\x80-\xFF]+$', '', substr($G, 0, 1e6)) . "\n...";
        $Kc[$_GET["db"]][] = array(
            $G,
            time()
        );
        return " <span class='time'>" . @date("H:i:s") . "</span> <a href='#$Oc' onclick=\"return !toggle('$Oc');\">" . lang(47) . "</a><div id='$Oc' class='hidden'><pre><code class='jush-$w'>" . shorten_utf8($G, 1000) . '</code></pre><p><a href="' . h(str_replace("db=" . urlencode(DB), "db=" . urlencode($_GET["db"]), ME) . 'sql=&history=' . (count($Kc[$_GET["db"]]) - 1)) . '">' . lang(34) . '</a></div>';
    }
    function editFunctions($o)
    {
        global $Lb;
        $I = ($o["null"] ? "NULL/" : "");
        foreach ($Lb as $x => $Cc) {
            if (!$x || (!isset($_GET["call"]) && (isset($_GET["select"]) || where($_GET)))) {
                foreach ($Cc as $He => $X) {
                    if (!$He || ereg($He, $o["type"]))
                        $I .= "/$X";
                }
                if ($x && !ereg('set|blob|bytea|raw|file', $o["type"]))
                    $I .= "/SQL";
            }
        }
        return explode("/", $I);
    }
    function editInput($P, $o, $_a, $Y)
    {
        if ($o["type"] == "enum")
            return (isset($_GET["select"]) ? "<label><input type='radio'$_a value='-1' checked><i>" . lang(6) . "</i></label> " : "") . ($o["null"] ? "<label><input type='radio'$_a value=''" . ($Y !== null || isset($_GET["select"]) ? "" : " checked") . "><i>NULL</i></label> " : "") . enum_input("radio", $_a, $o, $Y, 0);
        return "";
    }
    function processInput($o, $Y, $r = "")
    {
        if ($r == "SQL")
            return $Y;
        $B = $o["field"];
        $I = q($Y);
        if (ereg('^(now|getdate|uuid)$', $r))
            $I = "$r()";
        elseif (ereg('^current_(date|timestamp)$', $r))
            $I = $r;
        elseif (ereg('^([+-]|\\|\\|)$', $r))
            $I = idf_escape($B) . " $r $I";
        elseif (ereg('^[+-] interval$', $r))
            $I = idf_escape($B) . " $r " . (preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i", $Y) ? $Y : $I);
        elseif (ereg('^(addtime|subtime|concat)$', $r))
            $I = "$r(" . idf_escape($B) . ", $I)";
        elseif (ereg('^(md5|sha1|password|encrypt)$', $r))
            $I = "$r($I)";
        return unconvert_field($o, $I);
    }
    function dumpOutput()
    {
        $I = array(
            'text' => lang(48),
            'file' => lang(49)
        );
        if (function_exists('gzencode'))
            $I['gz'] = 'gzip';
        return $I;
    }
    function dumpFormat()
    {
        return array(
            'sql' => 'SQL',
            'csv' => 'CSV,',
            'csv;' => 'CSV;',
            'tsv' => 'TSV'
        );
    }
    function dumpDatabase($m)
    {
    }
    function dumpTable($P, $Rf, $fd = 0)
    {
        if ($_POST["format"] != "sql") {
            echo "\xef\xbb\xbf";
            if ($Rf)
                dump_csv(array_keys(fields($P)));
        } elseif ($Rf) {
            if ($fd == 2) {
                $p = array();
                foreach (fields($P) as $B => $o)
                    $p[] = idf_escape($B) . " $o[full_type]";
                $k = "CREATE TABLE " . table($P) . " (" . implode(", ", $p) . ")";
            } else
                $k = create_sql($P, $_POST["auto_increment"]);
            if ($k) {
                if ($Rf == "DROP+CREATE" || $fd == 1)
                    echo "DROP " . ($fd == 2 ? "VIEW" : "TABLE") . " IF EXISTS " . table($P) . ";\n";
                if ($fd == 1)
                    $k = remove_definer($k);
                echo "$k;\n\n";
            }
        }
    }
    function dumpData($P, $Rf, $G)
    {
        global $i, $w;
        $Dd = ($w == "sqlite" ? 0 : 1048576);
        if ($Rf) {
            if ($_POST["format"] == "sql") {
                if ($Rf == "TRUNCATE+INSERT")
                    echo truncate_sql($P) . ";\n";
                $p = fields($P);
            }
            $H = $i->query($G, 1);
            if ($H) {
                $ad = "";
                $La = "";
                $jd = array();
                $Tf = "";
                $nc = ($P != '' ? 'fetch_assoc' : 'fetch_row');
                while ($J = $H->$nc()) {
                    if (!$jd) {
                        $Sg = array();
                        foreach ($J as $X) {
                            $o    = $H->fetch_field();
                            $jd[] = $o->name;
                            $x    = idf_escape($o->name);
                            $Sg[] = "$x = VALUES($x)";
                        }
                        $Tf = ($Rf == "INSERT+UPDATE" ? "\nON DUPLICATE KEY UPDATE " . implode(", ", $Sg) : "") . ";\n";
                    }
                    if ($_POST["format"] != "sql") {
                        if ($Rf == "table") {
                            dump_csv($jd);
                            $Rf = "INSERT";
                        }
                        dump_csv($J);
                    } else {
                        if (!$ad)
                            $ad = "INSERT INTO " . table($P) . " (" . implode(", ", array_map('idf_escape', $jd)) . ") VALUES";
                        foreach ($J as $x => $X) {
                            $o     = $p[$x];
                            $J[$x] = ($X !== null ? unconvert_field($o, ereg('(^|[^o])int|float|double|decimal', $o["type"]) && $X != '' ? $X : q($X)) : "NULL");
                        }
                        $wf = ($Dd ? "\n" : " ") . "(" . implode(",\t", $J) . ")";
                        if (!$La)
                            $La = $ad . $wf;
                        elseif (strlen($La) + 4 + strlen($wf) + strlen($Tf) < $Dd)
                            $La .= ",$wf";
                        else {
                            echo $La . $Tf;
                            $La = $ad . $wf;
                        }
                    }
                }
                if ($La)
                    echo $La . $Tf;
            } elseif ($_POST["format"] == "sql")
                echo "-- " . str_replace("\n", " ", $i->error) . "\n";
        }
    }
    function dumpFilename($Pc)
    {
        return friendly_url($Pc != "" ? $Pc : (SERVER != "" ? SERVER : "localhost"));
    }
    function dumpHeaders($Pc, $Rd = false)
    {
        $ye = $_POST["output"];
        $hc = (ereg('sql', $_POST["format"]) ? "sql" : ($Rd ? "tar" : "csv"));
        header("Content-Type: " . ($ye == "gz" ? "application/x-gzip" : ($hc == "tar" ? "application/x-tar" : ($hc == "sql" || $ye != "file" ? "text/plain" : "text/csv") . "; charset=utf-8")));
        if ($ye == "gz")
            ob_start('gzencode', 1e6);
        return $hc;
    }
    function homepage()
    {
        echo '<p>' . ($_GET["ns"] == "" ? '<a href="' . h(ME) . 'database=">' . lang(50) . "</a>\n" : ""), (support("scheme") ? "<a href='" . h(ME) . "scheme='>" . ($_GET["ns"] != "" ? lang(51) : lang(52)) . "</a>\n" : ""), ($_GET["ns"] !== "" ? '<a href="' . h(ME) . 'schema=">' . lang(53) . "</a>\n" : ""), (support("privileges") ? "<a href='" . h(ME) . "privileges='>" . lang(54) . "</a>\n" : "");
        return true;
    }
    function navigation($Qd)
    {
        global $ia, $S, $w, $Eb;
        echo '<h1>
', $this->name(), ' <span class="version">', $ia, '</span>
<a href="http://www.adminer.org/#download" id="version">', (version_compare($ia, $_COOKIE["adminer_version"]) < 0 ? h($_COOKIE["adminer_version"]) : ""), '</a>
</h1>
';
        if ($Qd == "auth") {
            $rc = true;
            foreach ((array) $_SESSION["pwds"] as $Db => $Ff) {
                foreach ($Ff as $M => $Qg) {
                    foreach ($Qg as $V => $E) {
                        if ($E !== null) {
                            if ($rc) {
                                echo "<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";
                                $rc = false;
                            }
                            $tb = $_SESSION["db"][$Db][$M][$V];
                            foreach (($tb ? array_keys($tb) : array(
                                ""
                            )) as $m)
                                echo "<a href='" . h(auth_url($Db, $M, $V, $m)) . "'>($Eb[$Db]) " . h($V . ($M != "" ? "@$M" : "") . ($m != "" ? " - $m" : "")) . "</a><br>\n";
                        }
                    }
                }
            }
        } else {
            echo '<form action="" method="post">
<p class="logout">
';
            if (DB == "" || !$Qd) {
                echo "<a href='" . h(ME) . "sql='" . bold(isset($_GET["sql"])) . " title='" . lang(55) . "'>" . lang(47) . "</a>\n";
                if (support("dump"))
                    echo "<a href='" . h(ME) . "dump=" . urlencode(isset($_GET["table"]) ? $_GET["table"] : $_GET["select"]) . "' id='dump'" . bold(isset($_GET["dump"])) . ">" . lang(56) . "</a>\n";
            }
            echo '<input type="submit" name="logout" value="', lang(57), '" id="logout">
<input type="hidden" name="token" value="', $S, '">
</p>
</form>
';
            $this->databasesPrint($Qd);
            if ($_GET["ns"] !== "" && !$Qd && DB != "") {
                echo '<p><a href="' . h(ME) . 'create="' . bold($_GET["create"] === "") . ">" . lang(58) . "</a>\n";
                $R = table_status('', true);
                if (!$R)
                    echo "<p class='message'>" . lang(7) . "\n";
                else {
                    $this->tablesPrint($R);
                    $yd = array();
                    foreach ($R as $P => $T)
                        $yd[] = preg_quote($P, '/');
                    echo "<script type='text/javascript'>\n", "var jushLinks = { $w: [ '" . js_escape(ME) . "table=\$&', /\\b(" . implode("|", $yd) . ")\\b/g ] };\n";
                    foreach (array(
                        "bac",
                        "bra",
                        "sqlite_quo",
                        "mssql_bra"
                    ) as $X)
                        echo "jushLinks.$X = jushLinks.$w;\n";
                    echo "</script>\n";
                }
            }
        }
    }
    function databasesPrint($Qd)
    {
        global $i;
        $l = $this->databases();
        echo '<form action="">
<p id="dbs">
';
        hidden_fields_get();
        $rb = " onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'";
        echo ($l ? "<select name='db'$rb>" . optionlist(array(
            "" => "(" . lang(59) . ")"
        ) + $l, DB) . "</select>" : '<input name="db" value="' . h(DB) . '" autocapitalize="off">'), "<input type='submit' value='" . lang(10) . "'" . ($l ? " class='hidden'" : "") . ">\n";
        if ($Qd != "db" && DB != "" && $i->select_db(DB)) {
            if (support("scheme")) {
                echo "<br><select name='ns'$rb>" . optionlist(array(
                    "" => "(" . lang(60) . ")"
                ) + schemas(), $_GET["ns"]) . "</select>";
                if ($_GET["ns"] != "")
                    set_schema($_GET["ns"]);
            }
        }
        echo (isset($_GET["sql"]) ? '<input type="hidden" name="sql" value="">' : (isset($_GET["schema"]) ? '<input type="hidden" name="schema" value="">' : (isset($_GET["dump"]) ? '<input type="hidden" name="dump" value="">' : ""))), "</p></form>\n";
    }
    function tablesPrint($R)
    {
        echo "<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";
        foreach ($R as $P => $Nf) {
            echo '<a href="' . h(ME) . 'select=' . urlencode($P) . '"' . bold($_GET["select"] == $P || $_GET["edit"] == $P) . ">" . lang(61) . "</a> ", '<a href="' . h(ME) . 'table=' . urlencode($P) . '"' . bold(in_array($P, array(
                $_GET["table"],
                $_GET["create"],
                $_GET["indexes"],
                $_GET["foreign"],
                $_GET["trigger"]
            ))) . " title='" . lang(29) . "'>" . $this->tableName($Nf) . "</a><br>\n";
        }
    }
}
$b = (function_exists('adminer_object') ? adminer_object() : new Adminer);
if ($b->operators === null)
    $b->operators = $le;
function page_header($ng, $n = "", $Ka = array(), $og = "")
{
    global $ca, $b, $i, $Eb;
    header("Content-Type: text/html; charset=utf-8");
    if ($b->headers()) {
        header("X-Frame-Options: deny");
        header("X-XSS-Protection: 0");
    }
    $pg = $ng . ($og != "" ? ": " . h($og) : "");
    $qg = strip_tags($pg . (SERVER != "" && SERVER != "localhost" ? h(" - " . SERVER) : "") . " - " . $b->name());
    echo '<!DOCTYPE html>
<html lang="', $ca, '" dir="', lang(62), '">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>', $qg, '</title>
<link rel="stylesheet" type="text/css" href="', h(preg_replace("~\\?.*~", "", ME)) . "?file=default.css&amp;version=3.7.1", '">
<script type="text/javascript" src="', h(preg_replace("~\\?.*~", "", ME)) . "?file=functions.js&amp;version=3.7.1", '"></script>
';
    if ($b->head()) {
        echo '<link rel="shortcut icon" type="image/x-icon" href="', h(preg_replace("~\\?.*~", "", ME)) . "?file=favicon.ico&amp;version=3.7.1", '">
<link rel="apple-touch-icon" href="', h(preg_replace("~\\?.*~", "", ME)) . "?file=favicon.ico&amp;version=3.7.1", '">
';
        if (file_exists("adminer.css")) {
            echo '<link rel="stylesheet" type="text/css" href="adminer.css">
';
        }
    }
    echo '
<body class="', lang(62), ' nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);" onload="bodyLoad(\'', (is_object($i) ? substr($i->server_info, 0, 3) : ""), '\');', (isset($_COOKIE["adminer_version"]) ? "" : " verifyVersion();"), '">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="content">
';
    if ($Ka !== null) {
        $z = substr(preg_replace('~(username|db|ns)=[^&]*&~', '', ME), 0, -1);
        echo '<p id="breadcrumb"><a href="' . h($z ? $z : ".") . '">' . $Eb[DRIVER] . '</a> &raquo; ';
        $z = substr(preg_replace('~(db|ns)=[^&]*&~', '', ME), 0, -1);
        $M = (SERVER != "" ? h(SERVER) : lang(22));
        if ($Ka === false)
            echo "$M\n";
        else {
            echo "<a href='" . ($z ? h($z) : ".") . "' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";
            if ($_GET["ns"] != "" || (DB != "" && is_array($Ka)))
                echo '<a href="' . h($z . "&db=" . urlencode(DB) . (support("scheme") ? "&ns=" : "")) . '">' . h(DB) . '</a> &raquo; ';
            if (is_array($Ka)) {
                if ($_GET["ns"] != "")
                    echo '<a href="' . h(substr(ME, 0, -1)) . '">' . h($_GET["ns"]) . '</a> &raquo; ';
                foreach ($Ka as $x => $X) {
                    $xb = (is_array($X) ? $X[1] : $X);
                    if ($xb != "")
                        echo '<a href="' . h(ME . "$x=") . urlencode(is_array($X) ? $X[0] : $X) . '">' . h($xb) . '</a> &raquo; ';
                }
            }
            echo "$ng\n";
        }
    }
    echo "<h2>$pg</h2>\n";
    restart_session();
    $Mg = preg_replace('~^[^?]*~', '', $_SERVER["REQUEST_URI"]);
    $Nd = $_SESSION["messages"][$Mg];
    if ($Nd) {
        echo "<div class='message'>" . implode("</div>\n<div class='message'>", $Nd) . "</div>\n";
        unset($_SESSION["messages"][$Mg]);
    }
    $l =& get_session("dbs");
    if (DB != "" && $l && !in_array(DB, $l, true))
        $l = null;
    stop_session();
    if ($n)
        echo "<div class='error'>$n</div>\n";
    define("PAGE_HEADER", 1);
}
function page_footer($Qd = "")
{
    global $b;
    echo '</div>

';
    switch_lang();
    echo '<div id="menu">
';
    $b->navigation($Qd);
    echo '</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';
}
function int32($Td)
{
    while ($Td >= 2147483648)
        $Td -= 4294967296;
    while ($Td <= -2147483649)
        $Td += 4294967296;
    return (int) $Td;
}
function long2str($W, $Yg)
{
    $wf = '';
    foreach ($W as $X)
        $wf .= pack('V', $X);
    if ($Yg)
        return substr($wf, 0, end($W));
    return $wf;
}
function str2long($wf, $Yg)
{
    $W = array_values(unpack('V*', str_pad($wf, 4 * ceil(strlen($wf) / 4), "\0")));
    if ($Yg)
        $W[] = strlen($wf);
    return $W;
}
function xxtea_mx($dh, $ch, $Uf, $hd)
{
    return int32((($dh >> 5 & 0x7FFFFFF) ^ $ch << 2) + (($ch >> 3 & 0x1FFFFFFF) ^ $dh << 4)) ^ int32(($Uf ^ $ch) + ($hd ^ $dh));
}
function encrypt_string($Pf, $x)
{
    if ($Pf == "")
        return "";
    $x  = array_values(unpack("V*", pack("H*", md5($x))));
    $W  = str2long($Pf, true);
    $Td = count($W) - 1;
    $dh = $W[$Td];
    $ch = $W[0];
    $F  = floor(6 + 52 / ($Td + 1));
    $Uf = 0;
    while ($F-- > 0) {
        $Uf = int32($Uf + 0x9E3779B9);
        $Kb = $Uf >> 2 & 3;
        for ($ze = 0; $ze < $Td; $ze++) {
            $ch     = $W[$ze + 1];
            $Sd     = xxtea_mx($dh, $ch, $Uf, $x[$ze & 3 ^ $Kb]);
            $dh     = int32($W[$ze] + $Sd);
            $W[$ze] = $dh;
        }
        $ch     = $W[0];
        $Sd     = xxtea_mx($dh, $ch, $Uf, $x[$ze & 3 ^ $Kb]);
        $dh     = int32($W[$Td] + $Sd);
        $W[$Td] = $dh;
    }
    return long2str($W, false);
}
function decrypt_string($Pf, $x)
{
    if ($Pf == "")
        return "";
    if (!$x)
        return false;
    $x  = array_values(unpack("V*", pack("H*", md5($x))));
    $W  = str2long($Pf, false);
    $Td = count($W) - 1;
    $dh = $W[$Td];
    $ch = $W[0];
    $F  = floor(6 + 52 / ($Td + 1));
    $Uf = int32($F * 0x9E3779B9);
    while ($Uf) {
        $Kb = $Uf >> 2 & 3;
        for ($ze = $Td; $ze > 0; $ze--) {
            $dh     = $W[$ze - 1];
            $Sd     = xxtea_mx($dh, $ch, $Uf, $x[$ze & 3 ^ $Kb]);
            $ch     = int32($W[$ze] - $Sd);
            $W[$ze] = $ch;
        }
        $dh   = $W[$Td];
        $Sd   = xxtea_mx($dh, $ch, $Uf, $x[$ze & 3 ^ $Kb]);
        $ch   = int32($W[0] - $Sd);
        $W[0] = $ch;
        $Uf   = int32($Uf - 0x9E3779B9);
    }
    return long2str($W, true);
}
$i = '';
$S = $_SESSION["token"];
if (!$_SESSION["token"])
    $_SESSION["token"] = rand(1, 1e6);
$Ie = array();
if ($_COOKIE["adminer_permanent"]) {
    foreach (explode(" ", $_COOKIE["adminer_permanent"]) as $X) {
        list($x) = explode(":", $X);
        $Ie[$x] = $X;
    }
}
$d = $_POST["auth"];
if ($d) {
    session_regenerate_id();
    $_SESSION["pwds"][$d["driver"]][$d["server"]][$d["username"]]         = $d["password"];
    $_SESSION["db"][$d["driver"]][$d["server"]][$d["username"]][$d["db"]] = true;
    if ($d["permanent"]) {
        $x      = base64_encode($d["driver"]) . "-" . base64_encode($d["server"]) . "-" . base64_encode($d["username"]) . "-" . base64_encode($d["db"]);
        $Te     = $b->permanentLogin(true);
        $Ie[$x] = "$x:" . base64_encode($Te ? encrypt_string($d["password"], $Te) : "");
        cookie("adminer_permanent", implode(" ", $Ie));
    }
    if (count($_POST) == 1 || DRIVER != $d["driver"] || SERVER != $d["server"] || $_GET["username"] !== $d["username"] || DB != $d["db"])
        redirect(auth_url($d["driver"], $d["server"], $d["username"], $d["db"]));
} elseif ($_POST["logout"]) {
    if ($S && $_POST["token"] != $S) {
        page_header(lang(57), lang(63));
        page_footer("db");
        exit;
    } else {
        foreach (array(
            "pwds",
            "db",
            "dbs",
            "queries"
        ) as $x)
            set_session($x, null);
        unset_permanent();
        redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~', '', ME), 0, -1), lang(64));
    }
} elseif ($Ie && !$_SESSION["pwds"]) {
    session_regenerate_id();
    $Te = $b->permanentLogin();
    foreach ($Ie as $x => $X) {
        list(, $Ra) = explode(":", $X);
        list($Db, $M, $V, $m) = array_map('base64_decode', explode("-", $x));
        $_SESSION["pwds"][$Db][$M][$V]   = decrypt_string(base64_decode($Ra), $Te);
        $_SESSION["db"][$Db][$M][$V][$m] = true;
    }
}
function unset_permanent()
{
    global $Ie;
    foreach ($Ie as $x => $X) {
        list($Db, $M, $V, $m) = array_map('base64_decode', explode("-", $x));
        if ($Db == DRIVER && $M == SERVER && $V == $_GET["username"] && $m == DB)
            unset($Ie[$x]);
    }
    cookie("adminer_permanent", implode(" ", $Ie));
}
function auth_error($bc = null)
{
    global $i, $b, $S;
    $Gf = session_name();
    $n  = "";
    if (!$_COOKIE[$Gf] && $_GET[$Gf] && ini_bool("session.use_only_cookies"))
        $n = lang(65);
    elseif (isset($_GET["username"])) {
        if (($_COOKIE[$Gf] || $_GET[$Gf]) && !$S)
            $n = lang(66);
        else {
            $E =& get_session("pwds");
            if ($E !== null) {
                $n = h($bc ? $bc->getMessage() : (is_string($i) ? $i : lang(67)));
                if ($E === false)
                    $n .= '<br>' . lang(68, '<code>permanentLogin()</code>');
                $E = null;
            }
            unset_permanent();
        }
    }
    page_header(lang(26), $n, null);
    echo "<form action='' method='post'>\n";
    $b->loginForm();
    echo "<div>";
    hidden_fields($_POST, array(
        "auth"
    ));
    echo "</div>\n", "</form>\n";
    page_footer("auth");
}
if (isset($_GET["username"])) {
    if (!class_exists("Min_DB")) {
        unset($_SESSION["pwds"][DRIVER]);
        unset_permanent();
        page_header(lang(69), lang(70, implode(", ", $Ne)), false);
        page_footer("auth");
        exit;
    }
    $i = connect();
}
if (is_string($i) || !$b->login($_GET["username"], get_session("pwds"))) {
    auth_error();
    exit;
}
$S = $_SESSION["token"];
if ($d && $_POST["token"])
    $_POST["token"] = $S;
$n = '';
if ($_POST) {
    if ($_POST["token"] != $S) {
        $Xc = "max_input_vars";
        $Hd = ini_get($Xc);
        if (extension_loaded("suhosin")) {
            foreach (array(
                "suhosin.request.max_vars",
                "suhosin.post.max_vars"
            ) as $x) {
                $X = ini_get($x);
                if ($X && (!$Hd || $X < $Hd)) {
                    $Xc = $x;
                    $Hd = $X;
                }
            }
        }
        $n = (!$_POST["token"] && $Hd ? lang(71, "'$Xc'") : lang(63));
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = lang(72, "'post_max_size'");
    if (isset($_GET["sql"]))
        $n .= ' ' . lang(73);
}
if (!ini_bool("session.use_cookies") || @ini_set("session.use_cookies", false) !== false) {
    session_cache_limiter("");
    session_write_close();
}
function connect_error()
{
    global $b, $i, $S, $n, $Eb;
    $l = array();
    if (DB != "") {
        header("HTTP/1.1 404 Not Found");
        page_header(lang(25) . ": " . h(DB), lang(74), true);
    } else {
        if ($_POST["db"] && !$n)
            queries_redirect(substr(ME, 0, -1), lang(75), drop_databases($_POST["db"]));
        page_header(lang(76), $n, false);
        echo "<p><a href='" . h(ME) . "database='>" . lang(77) . "</a>\n";
        foreach (array(
            'privileges' => lang(54),
            'processlist' => lang(78),
            'variables' => lang(79),
            'status' => lang(80)
        ) as $x => $X) {
            if (support($x))
                echo "<a href='" . h(ME) . "$x='>$X</a>\n";
        }
        echo "<p>" . lang(81, $Eb[DRIVER], "<b>$i->server_info</b>", "<b>$i->extension</b>") . "\n", "<p>" . lang(82, "<b>" . h(logged_user()) . "</b>") . "\n";
        $hf = "<a href='" . h(ME) . "refresh=1'>" . lang(83) . "</a>\n";
        $l  = $b->databases();
        if ($l) {
            $zf = support("scheme");
            $Xa = collations();
            echo "<form action='' method='post'>\n", "<table cellspacing='0' class='checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n", "<thead><tr><td>&nbsp;<th>" . lang(25) . "<td>" . lang(84) . "<td>" . lang(85) . "</thead>\n";
            foreach ($l as $m) {
                $rf = h(ME) . "db=" . urlencode($m);
                echo "<tr" . odd() . "><td>" . checkbox("db[]", $m, in_array($m, (array) $_POST["db"])), "<th><a href='$rf'>" . h($m) . "</a>", "<td><a href='$rf" . ($zf ? "&amp;ns=" : "") . "&amp;database=' title='" . lang(50) . "'>" . nbsp(db_collation($m, $Xa)) . "</a>", "<td align='right'><a href='$rf&amp;schema=' id='tables-" . h($m) . "' title='" . lang(53) . "'>?</a>", "\n";
            }
            echo "</table>\n", "<script type='text/javascript'>tableCheck();</script>\n", "<p><input type='submit' name='drop' value='" . lang(86) . "'" . confirm("formChecked(this, /db/)") . ">\n", "<input type='hidden' name='token' value='$S'>\n", $hf, "</form>\n";
        } else
            echo "<p>$hf";
    }
    page_footer("db");
    if ($l)
        echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=connect');</script>\n";
}
if (isset($_GET["status"]))
    $_GET["variables"] = $_GET["status"];
if (!(DB != "" ? $i->select_db(DB) : isset($_GET["sql"]) || isset($_GET["dump"]) || isset($_GET["database"]) || isset($_GET["processlist"]) || isset($_GET["privileges"]) || isset($_GET["user"]) || isset($_GET["variables"]) || $_GET["script"] == "connect" || $_GET["script"] == "kill")) {
    if (DB != "" || $_GET["refresh"]) {
        restart_session();
        set_session("dbs", null);
    }
    connect_error();
    exit;
}
if (support("scheme") && DB != "" && $_GET["ns"] !== "") {
    if (!isset($_GET["ns"]))
        redirect(preg_replace('~ns=[^&]*&~', '', ME) . "ns=" . get_schema());
    if (!set_schema($_GET["ns"])) {
        header("HTTP/1.1 404 Not Found");
        page_header(lang(87) . ": " . h($_GET["ns"]), lang(88), true);
        page_footer("ns");
        exit;
    }
}
function select($H, $j = null, $Nc = "", $se = array())
{
    $yd = array();
    $v  = array();
    $g  = array();
    $Ia = array();
    $U  = array();
    $I  = array();
    odd('');
    for ($s = 0; $J = $H->fetch_row(); $s++) {
        if (!$s) {
            echo "<table cellspacing='0' class='nowrap'>\n", "<thead><tr>";
            for ($gd = 0; $gd < count($J); $gd++) {
                $o            = $H->fetch_field();
                $B            = $o->name;
                $re           = $o->orgtable;
                $qe           = $o->orgname;
                $I[$o->table] = $re;
                if ($Nc)
                    $yd[$gd] = ($B == "table" ? "table=" : ($B == "possible_keys" ? "indexes=" : null));
                elseif ($re != "") {
                    if (!isset($v[$re])) {
                        $v[$re] = array();
                        foreach (indexes($re, $j) as $u) {
                            if ($u["type"] == "PRIMARY") {
                                $v[$re] = array_flip($u["columns"]);
                                break;
                            }
                        }
                        $g[$re] = $v[$re];
                    }
                    if (isset($g[$re][$qe])) {
                        unset($g[$re][$qe]);
                        $v[$re][$qe] = $gd;
                        $yd[$gd]     = $re;
                    }
                }
                if ($o->charsetnr == 63)
                    $Ia[$gd] = true;
                $U[$gd] = $o->type;
                $B      = h($B);
                echo "<th" . ($re != "" || $o->name != $qe ? " title='" . h(($re != "" ? "$re." : "") . $qe) . "'" : "") . ">" . ($Nc ? "<a href='$Nc" . strtolower($B) . "' target='_blank' rel='noreferrer' class='help'>$B</a>" : $B);
            }
            echo "</thead>\n";
        }
        echo "<tr" . odd() . ">";
        foreach ($J as $x => $X) {
            if ($X === null)
                $X = "<i>NULL</i>";
            elseif ($Ia[$x] && !is_utf8($X))
                $X = "<i>" . lang(35, strlen($X)) . "</i>";
            elseif (!strlen($X))
                $X = "&nbsp;";
            else {
                $X = h($X);
                if ($U[$x] == 254)
                    $X = "<code>$X</code>";
            }
            if (isset($yd[$x]) && !$g[$yd[$x]]) {
                if ($Nc) {
                    $P = $J[array_search("table=", $yd)];
                    $z = $yd[$x] . urlencode($se[$P] != "" ? $se[$P] : $P);
                } else {
                    $z = "edit=" . urlencode($yd[$x]);
                    foreach ($v[$yd[$x]] as $Va => $gd)
                        $z .= "&where" . urlencode("[" . bracket_escape($Va) . "]") . "=" . urlencode($J[$gd]);
                }
                $X = "<a href='" . h(ME . $z) . "'>$X</a>";
            }
            echo "<td>$X";
        }
    }
    echo ($s ? "</table>" : "<p class='message'>" . lang(89)) . "\n";
    return $I;
}
function referencable_primary($Bf)
{
    $I = array();
    foreach (table_status('', true) as $Yf => $P) {
        if ($Yf != $Bf && fk_support($P)) {
            foreach (fields($Yf) as $o) {
                if ($o["primary"]) {
                    if ($I[$Yf]) {
                        unset($I[$Yf]);
                        break;
                    }
                    $I[$Yf] = $o;
                }
            }
        }
    }
    return $I;
}
function textarea($B, $Y, $K = 10, $Ya = 80)
{
    echo "<textarea name='$B' rows='$K' cols='$Ya' class='sqlarea' spellcheck='false' wrap='off' onkeydown='return textareaKeydown(this, event);'>";
    if (is_array($Y)) {
        foreach ($Y as $X)
            echo h($X[0]) . "\n\n\n";
    } else
        echo h($Y);
    echo "</textarea>";
}
function edit_type($x, $o, $Xa, $vc = array())
{
    global $Qf, $U, $Kg, $he;
    echo '<td><select name="', $x, '[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">', optionlist((!$o["type"] || isset($U[$o["type"]]) ? array() : array(
        $o["type"]
    )) + $Qf + ($vc ? array(
        lang(90) => $vc
    ) : array()), $o["type"]), '</select>
<td><input name="', $x, '[length]" value="', h($o["length"]), '" size="3" onfocus="editingLengthFocus(this);"><td class="options">';
    echo "<select name='$x" . "[collation]'" . (ereg('(char|text|enum|set)$', $o["type"]) ? "" : " class='hidden'") . '><option value="">(' . lang(91) . ')' . optionlist($Xa, $o["collation"]) . '</select>', ($Kg ? "<select name='$x" . "[unsigned]'" . (!$o["type"] || ereg('((^|[^o])int|float|double|decimal)$', $o["type"]) ? "" : " class='hidden'") . '><option>' . optionlist($Kg, $o["unsigned"]) . '</select>' : ''), (isset($o['on_update']) ? "<select name='$x" . "[on_update]'" . ($o["type"] == "timestamp" ? "" : " class='hidden'") . '>' . optionlist(array(
        "" => "(" . lang(92) . ")",
        "CURRENT_TIMESTAMP"
    ), $o["on_update"]) . '</select>' : ''), ($vc ? "<select name='$x" . "[on_delete]'" . (ereg("`", $o["type"]) ? "" : " class='hidden'") . "><option value=''>(" . lang(93) . ")" . optionlist(explode("|", $he), $o["on_delete"]) . "</select> " : " ");
}
function process_length($vd)
{
    global $Vb;
    return (preg_match("~^\\s*(?:$Vb)(?:\\s*,\\s*(?:$Vb))*\\s*\$~", $vd) && preg_match_all("~$Vb~", $vd, $Bd) ? implode(",", $Bd[0]) : preg_replace('~[^0-9,+-]~', '', $vd));
}
function process_type($o, $Wa = "COLLATE")
{
    global $Kg;
    return " $o[type]" . ($o["length"] != "" ? "(" . process_length($o["length"]) . ")" : "") . (ereg('(^|[^o])int|float|double|decimal', $o["type"]) && in_array($o["unsigned"], $Kg) ? " $o[unsigned]" : "") . (ereg('char|text|enum|set', $o["type"]) && $o["collation"] ? " $Wa " . q($o["collation"]) : "");
}
function process_field($o, $Cg)
{
    return array(
        idf_escape(trim($o["field"])),
        process_type($Cg),
        ($o["null"] ? " NULL" : " NOT NULL"),
        (isset($o["default"]) ? " DEFAULT " . ((ereg("time", $o["type"]) && eregi('^CURRENT_TIMESTAMP$', $o["default"])) || ($o["type"] == "bit" && ereg("^([0-9]+|b'[0-1]+')\$", $o["default"])) ? $o["default"] : q($o["default"])) : ""),
        ($o["type"] == "timestamp" && $o["on_update"] ? " ON UPDATE $o[on_update]" : ""),
        (support("comment") && $o["comment"] != "" ? " COMMENT " . q($o["comment"]) : ""),
        ($o["auto_increment"] ? auto_increment() : null)
    );
}
function type_class($T)
{
    foreach (array(
        'char' => 'text',
        'date' => 'time|year',
        'binary' => 'blob',
        'enum' => 'set'
    ) as $x => $X) {
        if (ereg("$x|$X", $T))
            return " class='$x'";
    }
}
function edit_fields($p, $Xa, $T = "TABLE", $vc = array(), $cb = false)
{
    global $i, $Yc;
    echo '<thead><tr class="wrap">
';
    if ($T == "PROCEDURE") {
        echo '<td>&nbsp;';
    }
    echo '<th>', ($T == "TABLE" ? lang(94) : lang(95)), '<td>', lang(96), '<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>', lang(97), '<td>', lang(98);
    if ($T == "TABLE") {
        echo '<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="', lang(99), '">AI</acronym>
<td>', lang(100), (support("comment") ? "<td" . ($cb ? "" : " class='hidden'") . ">" . lang(101) : "");
    }
    echo '<td>', "<input type='image' class='icon' name='add[" . (support("move_col") ? 0 : count($p)) . "]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(102) . "'>", '<script type="text/javascript">row_count = ', count($p), ';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';
    foreach ($p as $s => $o) {
        $s++;
        $te = $o[($_POST ? "orig" : "field")];
        $Bb = (isset($_POST["add"][$s - 1]) || (isset($o["field"]) && !$_POST["drop_col"][$s])) && (support("drop_col") || $te == "");
        echo '<tr', ($Bb ? "" : " style='display: none;'"), '>
', ($T == "PROCEDURE" ? "<td>" . html_select("fields[$s][inout]", explode("|", $Yc), $o["inout"]) : ""), '<th>';
        if ($Bb) {
            echo '<input name="fields[', $s, '][field]" value="', h($o["field"]), '" onchange="', ($o["field"] != "" || count($p) > 1 ? "" : "editingAddRow(this); "), 'editingNameChange(this);" maxlength="64" autocapitalize="off">';
        }
        echo '<input type="hidden" name="fields[', $s, '][orig]" value="', h($te), '">
';
        edit_type("fields[$s]", $o, $Xa, $vc);
        if ($T == "TABLE") {
            echo '<td>', checkbox("fields[$s][null]", 1, $o["null"], "", "", "block"), '<td><label class="block"><input type="radio" name="auto_increment_col" value="', $s, '"';
            if ($o["auto_increment"]) {
                echo ' checked';
            }
?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }"></label><td><?php
            echo checkbox("fields[$s][has_default]", 1, $o["has_default"]), '<input name="fields[', $s, '][default]" value="', h($o["default"]), '" onchange="this.previousSibling.checked = true;">
', (support("comment") ? "<td" . ($cb ? "" : " class='hidden'") . "><input name='fields[$s][comment]' value='" . h($o["comment"]) . "' maxlength='" . ($i->server_info >= 5.5 ? 1024 : 255) . "'>" : "");
        }
        echo "<td>", (support("move_col") ? "<input type='image' class='icon' name='add[$s]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(102) . "' onclick='return !editingAddRow(this, 1);'>&nbsp;" . "<input type='image' class='icon' name='up[$s]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=up.gif&amp;version=3.7.1' alt='^' title='" . lang(103) . "'>&nbsp;" . "<input type='image' class='icon' name='down[$s]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=down.gif&amp;version=3.7.1' alt='v' title='" . lang(104) . "'>&nbsp;" : ""), ($te == "" || support("drop_col") ? "<input type='image' class='icon' name='drop_col[$s]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=cross.gif&amp;version=3.7.1' alt='x' title='" . lang(105) . "' onclick='return !editingRemoveRow(this);'>" : ""), "\n";
    }
}
function process_fields(&$p)
{
    ksort($p);
    $C = 0;
    if ($_POST["up"]) {
        $pd = 0;
        foreach ($p as $x => $o) {
            if (key($_POST["up"]) == $x) {
                unset($p[$x]);
                array_splice($p, $pd, 0, array(
                    $o
                ));
                break;
            }
            if (isset($o["field"]))
                $pd = $C;
            $C++;
        }
    } elseif ($_POST["down"]) {
        $xc = false;
        foreach ($p as $x => $o) {
            if (isset($o["field"]) && $xc) {
                unset($p[key($_POST["down"])]);
                array_splice($p, $C, 0, array(
                    $xc
                ));
                break;
            }
            if (key($_POST["down"]) == $x)
                $xc = $o;
            $C++;
        }
    } elseif ($_POST["add"]) {
        $p = array_values($p);
        array_splice($p, key($_POST["add"]), 0, array(
            array()
        ));
    } elseif (!$_POST["drop_col"])
        return false;
    return true;
}
function normalize_enum($A)
{
    return "'" . str_replace("'", "''", addcslashes(stripcslashes(str_replace($A[0][0] . $A[0][0], $A[0][0], substr($A[0], 1, -1))), '\\')) . "'";
}
function grant($Dc, $Ve, $g, $ge)
{
    if (!$Ve)
        return true;
    if ($Ve == array(
        "ALL PRIVILEGES",
        "GRANT OPTION"
    ))
        return ($Dc == "GRANT" ? queries("$Dc ALL PRIVILEGES$ge WITH GRANT OPTION") : queries("$Dc ALL PRIVILEGES$ge") && queries("$Dc GRANT OPTION$ge"));
    return queries("$Dc " . preg_replace('~(GRANT OPTION)\\([^)]*\\)~', '\\1', implode("$g, ", $Ve) . $g) . $ge);
}
function drop_create($Fb, $k, $Gb, $ig, $Hb, $_, $Md, $Kd, $Ld, $de, $Wd)
{
    if ($_POST["drop"])
        query_redirect($Fb, $_, $Md);
    elseif ($de == "")
        query_redirect($k, $_, $Ld);
    elseif ($de != $Wd) {
        $lb = queries($k);
        queries_redirect($_, $Kd, $lb && queries($Fb));
        if ($lb)
            queries($Gb);
    } else
        queries_redirect($_, $Kd, queries($ig) && queries($Hb) && queries($Fb) && queries($k));
}
function create_trigger($ge, $J)
{
    global $w;
    $mg = " $J[Timing] $J[Event]";
    return "CREATE TRIGGER " . idf_escape($J["Trigger"]) . ($w == "mssql" ? $ge . $mg : $mg . $ge) . rtrim(" $J[Type]\n$J[Statement]", ";") . ";";
}
function create_routine($sf, $J)
{
    global $Yc;
    $N = array();
    $p = (array) $J["fields"];
    ksort($p);
    foreach ($p as $o) {
        if ($o["field"] != "")
            $N[] = (ereg("^($Yc)\$", $o["inout"]) ? "$o[inout] " : "") . idf_escape($o["field"]) . process_type($o, "CHARACTER SET");
    }
    return "CREATE $sf " . idf_escape(trim($J["name"])) . " (" . implode(", ", $N) . ")" . (isset($_GET["function"]) ? " RETURNS" . process_type($J["returns"], "CHARACTER SET") : "") . ($J["language"] ? " LANGUAGE $J[language]" : "") . rtrim("\n$J[definition]", ";") . ";";
}
function remove_definer($G)
{
    return preg_replace('~^([A-Z =]+) DEFINER=`' . preg_replace('~@(.*)~', '`@`(%|\\1)', logged_user()) . '`~', '\\1', $G);
}
function tar_file($pc, $rg)
{
    $I  = pack("a100a8a8a8a12a12", $pc, 644, 0, 0, decoct($rg->size), decoct(time()));
    $Qa = 8 * 32;
    for ($s = 0; $s < strlen($I); $s++)
        $Qa += ord($I[$s]);
    $I .= sprintf("%06o", $Qa) . "\0 ";
    echo $I, str_repeat("\0", 512 - strlen($I));
    $rg->send();
    echo str_repeat("\0", 511 - ($rg->size + 511) % 512);
}
function ini_bytes($Xc)
{
    $X = ini_get($Xc);
    switch (strtolower(substr($X, -1))) {
        case 'g':
            $X *= 1024;
        case 'm':
            $X *= 1024;
        case 'k':
            $X *= 1024;
    }
    return $X;
}
$he = "RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";
class TmpFile
{
    var $handler;
    var $size;
    function TmpFile()
    {
        $this->handler = tmpfile();
    }
    function write($gb)
    {
        $this->size += strlen($gb);
        fwrite($this->handler, $gb);
    }
    function send()
    {
        fseek($this->handler, 0);
        fpassthru($this->handler);
        fclose($this->handler);
    }
}
$Vb = "'(?:''|[^'\\\\]|\\\\.)*+'";
$Yc = "IN|OUT|INOUT";
if (isset($_GET["select"]) && ($_POST["edit"] || $_POST["clone"]) && !$_POST["save"])
    $_GET["edit"] = $_GET["select"];
if (isset($_GET["callf"]))
    $_GET["call"] = $_GET["callf"];
if (isset($_GET["function"]))
    $_GET["procedure"] = $_GET["function"];
if (isset($_GET["download"])) {
    $a = $_GET["download"];
    $p = fields($a);
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . friendly_url("$a-" . implode("_", $_GET["where"])) . "." . friendly_url($_GET["field"]));
    echo $i->result("SELECT" . limit(idf_escape($_GET["field"]) . " FROM " . table($a), " WHERE " . where($_GET, $p), 1));
    exit;
} elseif (isset($_GET["table"])) {
    $a = $_GET["table"];
    $p = fields($a);
    if (!$p)
        $n = error();
    $Q = table_status1($a, true);
    page_header(($p && is_view($Q) ? lang(106) : lang(107)) . ": " . h($a), $n);
    $b->selectLinks($Q);
    $bb = $Q["Comment"];
    if ($bb != "")
        echo "<p>" . lang(101) . ": " . h($bb) . "\n";
    if ($p) {
        echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(108) . "<td>" . lang(96) . (support("comment") ? "<td>" . lang(101) : "") . "</thead>\n";
        foreach ($p as $o) {
            echo "<tr" . odd() . "><th>" . h($o["field"]), "<td title='" . h($o["collation"]) . "'>" . h($o["full_type"]) . ($o["null"] ? " <i>NULL</i>" : "") . ($o["auto_increment"] ? " <i>" . lang(99) . "</i>" : ""), (isset($o["default"]) ? " [<b>" . h($o["default"]) . "</b>]" : ""), (support("comment") ? "<td>" . nbsp($o["comment"]) : ""), "\n";
        }
        echo "</table>\n";
        if (!is_view($Q)) {
            echo "<h3 id='indexes'>" . lang(109) . "</h3>\n";
            $v = indexes($a);
            if ($v) {
                echo "<table cellspacing='0'>\n";
                foreach ($v as $B => $u) {
                    ksort($u["columns"]);
                    $Se = array();
                    foreach ($u["columns"] as $x => $X)
                        $Se[] = "<i>" . h($X) . "</i>" . ($u["lengths"][$x] ? "(" . $u["lengths"][$x] . ")" : "") . ($u["descs"][$x] ? " DESC" : "");
                    echo "<tr title='" . h($B) . "'><th>$u[type]<td>" . implode(", ", $Se) . "\n";
                }
                echo "</table>\n";
            }
            echo '<p><a href="' . h(ME) . 'indexes=' . urlencode($a) . '">' . lang(110) . "</a>\n";
            if (fk_support($Q)) {
                echo "<h3 id='foreign-keys'>" . lang(90) . "</h3>\n";
                $vc = foreign_keys($a);
                if ($vc) {
                    echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(111) . "<td>" . lang(112) . "<td>" . lang(93) . "<td>" . lang(92) . ($w != "sqlite" ? "<td>&nbsp;" : "") . "</thead>\n";
                    foreach ($vc as $B => $q) {
                        echo "<tr title='" . h($B) . "'>", "<th><i>" . implode("</i>, <i>", array_map('h', $q["source"])) . "</i>", "<td><a href='" . h($q["db"] != "" ? preg_replace('~db=[^&]*~', "db=" . urlencode($q["db"]), ME) : ($q["ns"] != "" ? preg_replace('~ns=[^&]*~', "ns=" . urlencode($q["ns"]), ME) : ME)) . "table=" . urlencode($q["table"]) . "'>" . ($q["db"] != "" ? "<b>" . h($q["db"]) . "</b>." : "") . ($q["ns"] != "" ? "<b>" . h($q["ns"]) . "</b>." : "") . h($q["table"]) . "</a>", "(<i>" . implode("</i>, <i>", array_map('h', $q["target"])) . "</i>)", "<td>" . nbsp($q["on_delete"]) . "\n", "<td>" . nbsp($q["on_update"]) . "\n", ($w == "sqlite" ? "" : '<td><a href="' . h(ME . 'foreign=' . urlencode($a) . '&name=' . urlencode($B)) . '">' . lang(113) . '</a>');
                    }
                    echo "</table>\n";
                }
                if ($w != "sqlite")
                    echo '<p><a href="' . h(ME) . 'foreign=' . urlencode($a) . '">' . lang(114) . "</a>\n";
            }
            if (support("trigger")) {
                echo "<h3 id='triggers'>" . lang(115) . "</h3>\n";
                $Bg = triggers($a);
                if ($Bg) {
                    echo "<table cellspacing='0'>\n";
                    foreach ($Bg as $x => $X)
                        echo "<tr valign='top'><td>$X[0]<td>$X[1]<th>" . h($x) . "<td><a href='" . h(ME . 'trigger=' . urlencode($a) . '&name=' . urlencode($x)) . "'>" . lang(113) . "</a>\n";
                    echo "</table>\n";
                }
                echo '<p><a href="' . h(ME) . 'trigger=' . urlencode($a) . '">' . lang(116) . "</a>\n";
            }
        }
    }
} elseif (isset($_GET["schema"])) {
    page_header(lang(53), "", array(), DB . ($_GET["ns"] ? ".$_GET[ns]" : ""));
    $ag = array();
    $bg = array();
    $B  = "adminer_schema";
    $ea = ($_GET["schema"] ? $_GET["schema"] : $_COOKIE[($_COOKIE["$B-" . DB] ? "$B-" . DB : $B)]);
    preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~', $ea, $Bd, PREG_SET_ORDER);
    foreach ($Bd as $s => $A) {
        $ag[$A[1]] = array(
            $A[2],
            $A[3]
        );
        $bg[]      = "\n\t'" . js_escape($A[1]) . "': [ $A[2], $A[3] ]";
    }
    $tg = 0;
    $Fa = -1;
    $yf = array();
    $gf = array();
    $td = array();
    foreach (table_status('', true) as $P => $Q) {
        if (is_view($Q))
            continue;
        $Ke               = 0;
        $yf[$P]["fields"] = array();
        foreach (fields($P) as $B => $o) {
            $Ke += 1.25;
            $o["pos"]             = $Ke;
            $yf[$P]["fields"][$B] = $o;
        }
        $yf[$P]["pos"] = ($ag[$P] ? $ag[$P] : array(
            $tg,
            0
        ));
        foreach ($b->foreignKeys($P) as $X) {
            if (!$X["db"]) {
                $rd = $Fa;
                if ($ag[$P][1] || $ag[$X["table"]][1])
                    $rd = min(floatval($ag[$P][1]), floatval($ag[$X["table"]][1])) - 1;
                else
                    $Fa -= .1;
                while ($td[(string) $rd])
                    $rd -= .0001;
                $yf[$P]["references"][$X["table"]][(string) $rd] = array(
                    $X["source"],
                    $X["target"]
                );
                $gf[$X["table"]][$P][(string) $rd]               = $X["target"];
                $td[(string) $rd]                                = true;
            }
        }
        $tg = max($tg, $yf[$P]["pos"][0] + 2.5 + $Ke);
    }
    echo '<div id="schema" style="height: ', $tg, 'em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {', implode(",", $bg) . "\n", '};
var em = document.getElementById(\'schema\').offsetHeight / ', $tg, ';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'', js_escape(DB), '\');
};
</script>
';
    foreach ($yf as $B => $P) {
        echo "<div class='table' style='top: " . $P["pos"][0] . "em; left: " . $P["pos"][1] . "em;' onmousedown='schemaMousedown(this, event);'>", '<a href="' . h(ME) . 'table=' . urlencode($B) . '"><b>' . h($B) . "</b></a>";
        foreach ($P["fields"] as $o) {
            $X = '<span' . type_class($o["type"]) . ' title="' . h($o["full_type"] . ($o["null"] ? " NULL" : '')) . '">' . h($o["field"]) . '</span>';
            echo "<br>" . ($o["primary"] ? "<i>$X</i>" : $X);
        }
        foreach ((array) $P["references"] as $gg => $if) {
            foreach ($if as $rd => $df) {
                $sd = $rd - $ag[$B][1];
                $s  = 0;
                foreach ($df[0] as $If)
                    echo "\n<div class='references' title='" . h($gg) . "' id='refs$rd-" . ($s++) . "' style='left: $sd" . "em; top: " . $P["fields"][$If]["pos"] . "em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: " . (-$sd) . "em;'></div></div>";
            }
        }
        foreach ((array) $gf[$B] as $gg => $if) {
            foreach ($if as $rd => $g) {
                $sd = $rd - $ag[$B][1];
                $s  = 0;
                foreach ($g as $fg)
                    echo "\n<div class='references' title='" . h($gg) . "' id='refd$rd-" . ($s++) . "' style='left: $sd" . "em; top: " . $P["fields"][$fg]["pos"] . "em; height: 1.25em; background: url(" . h(preg_replace("~\\?.*~", "", ME)) . "?file=arrow.gif) no-repeat right center;&amp;version=3.7.1'><div style='height: .5em; border-bottom: 1px solid Gray; width: " . (-$sd) . "em;'></div></div>";
            }
        }
        echo "\n</div>\n";
    }
    foreach ($yf as $B => $P) {
        foreach ((array) $P["references"] as $gg => $if) {
            foreach ($if as $rd => $df) {
                $Pd = $tg;
                $Fd = -10;
                foreach ($df[0] as $x => $If) {
                    $Le = $P["pos"][0] + $P["fields"][$If]["pos"];
                    $Me = $yf[$gg]["pos"][0] + $yf[$gg]["fields"][$df[1][$x]]["pos"];
                    $Pd = min($Pd, $Le, $Me);
                    $Fd = max($Fd, $Le, $Me);
                }
                echo "<div class='references' id='refl$rd' style='left: $rd" . "em; top: $Pd" . "em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: " . ($Fd - $Pd) . "em;'></div></div>\n";
            }
        }
    }
    echo '</div>
<p><a href="', h(ME . "schema=" . urlencode($ea)), '" id="schema-link">', lang(117), '</a>
';
} elseif (isset($_GET["dump"])) {
    $a = $_GET["dump"];
    if ($_POST && !$n) {
        $ib = "";
        foreach (array(
            "output",
            "format",
            "db_style",
            "routines",
            "events",
            "table_style",
            "auto_increment",
            "triggers",
            "data_style"
        ) as $x)
            $ib .= "&$x=" . urlencode($_POST[$x]);
        cookie("adminer_export", substr($ib, 1));
        $R  = array_flip((array) $_POST["tables"]) + array_flip((array) $_POST["data"]);
        $hc = dump_headers((count($R) == 1 ? key($R) : DB), (DB == "" || count($R) > 1));
        $dd = ereg('sql', $_POST["format"]);
        if ($dd)
            echo "-- Adminer $ia " . $Eb[DRIVER] . " dump

" . ($w != "sql" ? "" : "SET NAMES utf8;
" . ($_POST["data_style"] ? "SET foreign_key_checks = 0;
SET time_zone = " . q(substr(preg_replace('~^[^-]~', '+\0', $i->result("SELECT TIMEDIFF(NOW(), UTC_TIMESTAMP)")), 0, 6)) . ";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
" : "") . "
");
        $Rf = $_POST["db_style"];
        $l  = array(
            DB
        );
        if (DB == "") {
            $l = $_POST["databases"];
            if (is_string($l))
                $l = explode("\n", rtrim(str_replace("\r", "", $l), "\n"));
        }
        foreach ((array) $l as $m) {
            $b->dumpDatabase($m);
            if ($i->select_db($m)) {
                if ($dd && ereg('CREATE', $Rf) && ($k = $i->result("SHOW CREATE DATABASE " . idf_escape($m), 1))) {
                    if ($Rf == "DROP+CREATE")
                        echo "DROP DATABASE IF EXISTS " . idf_escape($m) . ";\n";
                    echo "$k;\n";
                }
                if ($dd) {
                    if ($Rf)
                        echo use_sql($m) . ";\n\n";
                    $xe = "";
                    if ($_POST["routines"]) {
                        foreach (array(
                            "FUNCTION",
                            "PROCEDURE"
                        ) as $sf) {
                            foreach (get_rows("SHOW $sf STATUS WHERE Db = " . q($m), null, "-- ") as $J)
                                $xe .= ($Rf != 'DROP+CREATE' ? "DROP $sf IF EXISTS " . idf_escape($J["Name"]) . ";;\n" : "") . remove_definer($i->result("SHOW CREATE $sf " . idf_escape($J["Name"]), 2)) . ";;\n\n";
                        }
                    }
                    if ($_POST["events"]) {
                        foreach (get_rows("SHOW EVENTS", null, "-- ") as $J)
                            $xe .= ($Rf != 'DROP+CREATE' ? "DROP EVENT IF EXISTS " . idf_escape($J["Name"]) . ";;\n" : "") . remove_definer($i->result("SHOW CREATE EVENT " . idf_escape($J["Name"]), 3)) . ";;\n\n";
                    }
                    if ($xe)
                        echo "DELIMITER ;;\n\n$xe" . "DELIMITER ;\n\n";
                }
                if ($_POST["table_style"] || $_POST["data_style"]) {
                    $Wg = array();
                    foreach (table_status('', true) as $B => $Q) {
                        $P  = (DB == "" || in_array($B, (array) $_POST["tables"]));
                        $ob = (DB == "" || in_array($B, (array) $_POST["data"]));
                        if ($P || $ob) {
                            if ($hc == "tar") {
                                $rg = new TmpFile;
                                ob_start(array(
                                    $rg,
                                    'write'
                                ), 1e5);
                            }
                            $b->dumpTable($B, ($P ? $_POST["table_style"] : ""), (is_view($Q) ? 2 : 0));
                            if (is_view($Q))
                                $Wg[] = $B;
                            elseif ($ob) {
                                $p = fields($B);
                                $b->dumpData($B, $_POST["data_style"], "SELECT *" . convert_fields($p, $p) . " FROM " . table($B));
                            }
                            if ($dd && $_POST["triggers"] && $P && ($Bg = trigger_sql($B, $_POST["table_style"])))
                                echo "\nDELIMITER ;;\n$Bg\nDELIMITER ;\n";
                            if ($hc == "tar") {
                                ob_end_flush();
                                tar_file((DB != "" ? "" : "$m/") . "$B.csv", $rg);
                            } elseif ($dd)
                                echo "\n";
                        }
                    }
                    foreach ($Wg as $Vg)
                        $b->dumpTable($Vg, $_POST["table_style"], 1);
                    if ($hc == "tar")
                        echo pack("x512");
                }
            }
        }
        if ($dd)
            echo "-- " . $i->result("SELECT NOW()") . "\n";
        exit;
    }
    page_header(lang(118), $n, ($_GET["export"] != "" ? array(
        "table" => $_GET["export"]
    ) : array()), DB);
    echo '
<form action="" method="post">
<table cellspacing="0">
';
    $sb = array(
        '',
        'USE',
        'DROP+CREATE',
        'CREATE'
    );
    $cg = array(
        '',
        'DROP+CREATE',
        'CREATE'
    );
    $pb = array(
        '',
        'TRUNCATE+INSERT',
        'INSERT'
    );
    if ($w == "sql")
        $pb[] = 'INSERT+UPDATE';
    parse_str($_COOKIE["adminer_export"], $J);
    if (!$J)
        $J = array(
            "output" => "text",
            "format" => "sql",
            "db_style" => (DB != "" ? "" : "CREATE"),
            "table_style" => "DROP+CREATE",
            "data_style" => "INSERT"
        );
    if (!isset($J["events"])) {
        $J["routines"] = $J["events"] = ($_GET["dump"] == "");
        $J["triggers"] = $J["table_style"];
    }
    echo "<tr><th>" . lang(119) . "<td>" . html_select("output", $b->dumpOutput(), $J["output"], 0) . "\n";
    echo "<tr><th>" . lang(120) . "<td>" . html_select("format", $b->dumpFormat(), $J["format"], 0) . "\n";
    echo ($w == "sqlite" ? "" : "<tr><th>" . lang(25) . "<td>" . html_select('db_style', $sb, $J["db_style"]) . (support("routine") ? checkbox("routines", 1, $J["routines"], lang(121)) : "") . (support("event") ? checkbox("events", 1, $J["events"], lang(122)) : "")), "<tr><th>" . lang(85) . "<td>" . html_select('table_style', $cg, $J["table_style"]) . checkbox("auto_increment", 1, $J["auto_increment"], lang(99)) . (support("trigger") ? checkbox("triggers", 1, $J["triggers"], lang(115)) : ""), "<tr><th>" . lang(123) . "<td>" . html_select('data_style', $pb, $J["data_style"]), '</table>
<p><input type="submit" value="', lang(118), '">
<input type="hidden" name="token" value="', $S, '">

<table cellspacing="0">
';
    $Pe = array();
    if (DB != "") {
        $Pa = ($a != "" ? "" : " checked");
        echo "<thead><tr>", "<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$Pa onclick='formCheck(this, /^tables\\[/);'>" . lang(85) . "</label>", "<th style='text-align: right;'><label class='block'>" . lang(123) . "<input type='checkbox' id='check-data'$Pa onclick='formCheck(this, /^data\\[/);'></label>", "</thead>\n";
        $Wg = "";
        $dg = tables_list();
        foreach ($dg as $B => $T) {
            $Oe = ereg_replace("_.*", "", $B);
            $Pa = ($a == "" || $a == (substr($a, -1) == "%" ? "$Oe%" : $B));
            $Se = "<tr><td>" . checkbox("tables[]", $B, $Pa, $B, "checkboxClick(event, this); formUncheck('check-tables');", "block");
            if ($T !== null && !eregi("table", $T))
                $Wg .= "$Se\n";
            else
                echo "$Se<td align='right'><label class='block'><span id='Rows-" . h($B) . "'></span>" . checkbox("data[]", $B, $Pa, "", "checkboxClick(event, this); formUncheck('check-data');") . "</label>\n";
            $Pe[$Oe]++;
        }
        echo $Wg;
        if ($dg)
            echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=db');</script>\n";
    } else {
        echo "<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-databases'" . ($a == "" ? " checked" : "") . " onclick='formCheck(this, /^databases\\[/);'>" . lang(25) . "</label></thead>\n";
        $l = $b->databases();
        if ($l) {
            foreach ($l as $m) {
                if (!information_schema($m)) {
                    $Oe = ereg_replace("_.*", "", $m);
                    echo "<tr><td>" . checkbox("databases[]", $m, $a == "" || $a == "$Oe%", $m, "formUncheck('check-databases');", "block") . "\n";
                    $Pe[$Oe]++;
                }
            }
        } else
            echo "<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";
    }
    echo '</table>
</form>
';
    $rc = true;
    foreach ($Pe as $x => $X) {
        if ($x != "" && $X > 1) {
            echo ($rc ? "<p>" : " ") . "<a href='" . h(ME) . "dump=" . urlencode("$x%") . "'>" . h($x) . "</a>";
            $rc = false;
        }
    }
} elseif (isset($_GET["privileges"])) {
    page_header(lang(54));
    $H  = $i->query("SELECT User, Host FROM mysql." . (DB == "" ? "user" : "db WHERE " . q(DB) . " LIKE Db") . " ORDER BY Host, User");
    $Dc = $H;
    if (!$H)
        $H = $i->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");
    echo "<form action=''><p>\n";
    hidden_fields_get();
    echo "<input type='hidden' name='db' value='" . h(DB) . "'>\n", ($Dc ? "" : "<input type='hidden' name='grant' value=''>\n"), "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(23) . "<th>" . lang(22) . "<th>&nbsp;</thead>\n";
    while ($J = $H->fetch_assoc())
        echo '<tr' . odd() . '><td>' . h($J["User"]) . "<td>" . h($J["Host"]) . '<td><a href="' . h(ME . 'user=' . urlencode($J["User"]) . '&host=' . urlencode($J["Host"])) . '">' . lang(34) . "</a>\n";
    if (!$Dc || DB != "")
        echo "<tr" . odd() . "><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='" . lang(34) . "'>\n";
    echo "</table>\n", "</form>\n", '<p><a href="' . h(ME) . 'user=">' . lang(124) . "</a>";
} elseif (isset($_GET["sql"])) {
    if (!$n && $_POST["export"]) {
        dump_headers("sql");
        $b->dumpTable("", "");
        $b->dumpData("", "table", $_POST["query"]);
        exit;
    }
    restart_session();
    $Lc =& get_session("queries");
    $Kc =& $Lc[DB];
    if (!$n && $_POST["clear"]) {
        $Kc = array();
        redirect(remove_from_uri("history"));
    }
    page_header(lang(47), $n);
    if (!$n && $_POST) {
        $zc = false;
        $G  = $_POST["query"];
        if ($_POST["webfile"]) {
            $zc = @fopen((file_exists("adminer.sql") ? "adminer.sql" : "compress.zlib://adminer.sql.gz"), "rb");
            $G  = ($zc ? fread($zc, 1e6) : false);
        } elseif ($_FILES && $_FILES["sql_file"]["error"][0] != 4)
            $G = get_file("sql_file", true);
        if (is_string($G)) {
            if (function_exists('memory_get_usage'))
                @ini_set("memory_limit", max(ini_bytes("memory_limit"), 2 * strlen($G) + memory_get_usage() + 8e6));
            if ($G != "" && strlen($G) < 1e6) {
                $F = $G . (ereg(";[ \t\r\n]*\$", $G) ? "" : ";");
                if (!$Kc || reset(end($Kc)) != $F) {
                    restart_session();
                    $Kc[] = array(
                        $F,
                        time()
                    );
                    set_session("queries", $Lc);
                    stop_session();
                }
            }
            $Jf = "(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";
            $wb = ";";
            $C  = 0;
            $Rb = true;
            $j  = connect();
            if (is_object($j) && DB != "")
                $j->select_db(DB);
            $ab = 0;
            $Xb = array();
            $xd = 0;
            $Be = '[\'"' . ($w == "sql" ? '`#' : ($w == "sqlite" ? '`[' : ($w == "mssql" ? '[' : ''))) . ']|/\\*|-- |$' . ($w == "pgsql" ? '|\\$[^$]*\\$' : '');
            $ug = microtime();
            parse_str($_COOKIE["adminer_export"], $qa);
            $Jb = $b->dumpFormat();
            unset($Jb["sql"]);
            while ($G != "") {
                if (!$C && preg_match("~^$Jf*DELIMITER\\s+(\\S+)~i", $G, $A)) {
                    $wb = $A[1];
                    $G  = substr($G, strlen($A[0]));
                } else {
                    preg_match('(' . preg_quote($wb) . "\\s*|$Be)", $G, $A, PREG_OFFSET_CAPTURE, $C);
                    list($xc, $Ke) = $A[0];
                    if (!$xc && $zc && !feof($zc))
                        $G .= fread($zc, 1e5);
                    else {
                        if (!$xc && rtrim($G) == "")
                            break;
                        $C = $Ke + strlen($xc);
                        if ($xc && rtrim($xc) != $wb) {
                            while (preg_match('(' . ($xc == '/*' ? '\\*/' : ($xc == '[' ? ']' : (ereg('^-- |^#', $xc) ? "\n" : preg_quote($xc) . "|\\\\."))) . '|$)s', $G, $A, PREG_OFFSET_CAPTURE, $C)) {
                                $wf = $A[0][0];
                                if (!$wf && $zc && !feof($zc))
                                    $G .= fread($zc, 1e5);
                                else {
                                    $C = $A[0][1] + strlen($wf);
                                    if ($wf[0] != "\\")
                                        break;
                                }
                            }
                        } else {
                            $Rb = false;
                            $F  = substr($G, 0, $Ke);
                            $ab++;
                            $Se = "<pre id='sql-$ab'><code class='jush-$w'>" . shorten_utf8(trim($F), 1000) . "</code></pre>\n";
                            if (!$_POST["only_errors"]) {
                                echo $Se;
                                ob_flush();
                                flush();
                            }
                            $Mf = microtime();
                            if ($i->multi_query($F) && is_object($j) && preg_match("~^$Jf*USE\\b~isU", $F))
                                $j->query($F);
                            do {
                                $H  = $i->store_result();
                                $Sb = microtime();
                                $lg = " <span class='time'>(" . format_time($Mf, $Sb) . ")</span>" . (strlen($F) < 1000 ? " <a href='" . h(ME) . "sql=" . urlencode(trim($F)) . "'>" . lang(34) . "</a>" : "");
                                if ($i->error) {
                                    echo ($_POST["only_errors"] ? $Se : ""), "<p class='error'>" . lang(125) . ($i->errno ? " ($i->errno)" : "") . ": " . error() . "\n";
                                    $Xb[] = " <a href='#sql-$ab'>$ab</a>";
                                    if ($_POST["error_stops"])
                                        break 2;
                                } elseif (is_object($H)) {
                                    $se = select($H, $j);
                                    if (!$_POST["only_errors"]) {
                                        echo "<form action='' method='post'>\n", "<p>" . ($H->num_rows ? lang(126, $H->num_rows) : "") . $lg;
                                        $Oc = "export-$ab";
                                        $gc = ", <a href='#$Oc' onclick=\"return !toggle('$Oc');\">" . lang(118) . "</a><span id='$Oc' class='hidden'>: " . html_select("output", $b->dumpOutput(), $qa["output"]) . " " . html_select("format", $Jb, $qa["format"]) . "<input type='hidden' name='query' value='" . h($F) . "'>" . " <input type='submit' name='export' value='" . lang(118) . "'><input type='hidden' name='token' value='$S'></span>\n";
                                        if ($j && preg_match("~^($Jf|\\()*SELECT\\b~isU", $F) && ($fc = explain($j, $F))) {
                                            $Oc = "explain-$ab";
                                            echo ", <a href='#$Oc' onclick=\"return !toggle('$Oc');\">EXPLAIN</a>$gc", "<div id='$Oc' class='hidden'>\n";
                                            select($fc, $j, ($w == "sql" ? "http://dev.mysql.com/doc/refman/" . substr($i->server_info, 0, 3) . "/en/explain-output.html#explain_" : ""), $se);
                                            echo "</div>\n";
                                        } else
                                            echo $gc;
                                        echo "</form>\n";
                                    }
                                } else {
                                    if (preg_match("~^$Jf*(CREATE|DROP|ALTER)$Jf+(DATABASE|SCHEMA)\\b~isU", $F)) {
                                        restart_session();
                                        set_session("dbs", null);
                                        stop_session();
                                    }
                                    if (!$_POST["only_errors"])
                                        echo "<p class='message' title='" . h($i->info) . "'>" . lang(127, $i->affected_rows) . "$lg\n";
                                }
                                $Mf = $Sb;
                            } while ($i->next_result());
                            $xd += substr_count($F . $xc, "\n");
                            $G = substr($G, $C);
                            $C = 0;
                        }
                    }
                }
            }
            if ($Rb)
                echo "<p class='message'>" . lang(128) . "\n";
            elseif ($_POST["only_errors"]) {
                echo "<p class='message'>" . lang(129, $ab - count($Xb)), " <span class='time'>(" . format_time($ug, microtime()) . ")</span>\n";
            } elseif ($Xb && $ab > 1)
                echo "<p class='error'>" . lang(125) . ": " . implode("", $Xb) . "\n";
        } else
            echo "<p class='error'>" . upload_error($G) . "\n";
    }
    echo '
<form action="" method="post" enctype="multipart/form-data" id="form">
<p>';
    $F = $_GET["sql"];
    if ($_POST)
        $F = $_POST["query"];
    elseif ($_GET["history"] == "all")
        $F = $Kc;
    elseif ($_GET["history"] != "")
        $F = $Kc[$_GET["history"]][0];
    textarea("query", $F, 20);
    echo ($_POST ? "" : "<script type='text/javascript'>focus(document.getElementsByTagName('textarea')[0]);</script>\n"), "<p>" . (ini_bool("file_uploads") ? lang(130) . ': <input type="file" name="sql_file[]" multiple' . ($_FILES && $_FILES["sql_file"]["error"][0] != 4 ? '' : ' onchange="this.form[\'only_errors\'].checked = true;"') . '> (&lt; ' . ini_get("upload_max_filesize") . 'B)' : lang(131)), '<p>
<input type="submit" value="', lang(33), '" title="Ctrl+Enter">
', checkbox("error_stops", 1, $_POST["error_stops"], lang(132)) . "\n", checkbox("only_errors", 1, $_POST["only_errors"], lang(133)) . "\n";
    print_fieldset("webfile", lang(134), $_POST["webfile"], "document.getElementById('form')['only_errors'].checked = true; ");
    echo lang(135, "<code>adminer.sql" . (extension_loaded("zlib") ? "[.gz]" : "") . "</code>"), ' <input type="submit" name="webfile" value="' . lang(136) . '">', "</div></fieldset>\n";
    if ($Kc) {
        print_fieldset("history", lang(137), $_GET["history"] != "");
        for ($X = end($Kc); $X; $X = prev($Kc)) {
            $x = key($Kc);
            list($F, $lg) = $X;
            echo '<a href="' . h(ME . "sql=&history=$x") . '">' . lang(34) . "</a> <span class='time' title='" . @date('Y-m-d', $lg) . "'>" . @date("H:i:s", $lg) . "</span> <code class='jush-$w'>" . shorten_utf8(ltrim(str_replace("\n", " ", str_replace("\r", "", preg_replace('~^(#|-- ).*~m', '', $F)))), 80, "</code>") . "<br>\n";
        }
        echo "<input type='submit' name='clear' value='" . lang(138) . "'>\n", "<a href='" . h(ME . "sql=&history=all") . "'>" . lang(139) . "</a>\n", "</div></fieldset>\n";
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["edit"])) {
    $a  = $_GET["edit"];
    $p  = fields($a);
    $Z  = (isset($_GET["select"]) ? (count($_POST["check"]) == 1 ? where_check($_POST["check"][0], $p) : "") : where($_GET, $p));
    $Lg = (isset($_GET["select"]) ? $_POST["edit"] : $Z);
    foreach ($p as $B => $o) {
        if (!isset($o["privileges"][$Lg ? "update" : "insert"]) || $b->fieldName($o) == "")
            unset($p[$B]);
    }
    if ($_POST && !$n && !isset($_GET["select"])) {
        $_ = $_POST["referer"];
        if ($_POST["insert"])
            $_ = ($Lg ? null : $_SERVER["REQUEST_URI"]);
        elseif (!ereg('^.+&select=.+$', $_))
            $_ = ME . "select=" . urlencode($a);
        $v  = indexes($a);
        $Gg = unique_array($_GET["where"], $v);
        $af = "\nWHERE $Z";
        if (isset($_POST["delete"])) {
            $G = "FROM " . table($a);
            query_redirect("DELETE" . ($Gg ? " $G$af" : limit1($G, $af)), $_, lang(140));
        } else {
            $N = array();
            foreach ($p as $B => $o) {
                $X = process_input($o);
                if ($X !== false && $X !== null)
                    $N[idf_escape($B)] = ($Lg ? "\n" . idf_escape($B) . " = $X" : $X);
            }
            if ($Lg) {
                if (!$N)
                    redirect($_);
                $G = table($a) . " SET" . implode(",", $N);
                query_redirect("UPDATE" . ($Gg ? " $G$af" : limit1($G, $af)), $_, lang(141));
            } else {
                $H  = insert_into($a, $N);
                $qd = ($H ? last_id() : 0);
                queries_redirect($_, lang(142, ($qd ? " $qd" : "")), $H);
            }
        }
    }
    $Yf = $b->tableName(table_status1($a, true));
    page_header(($Lg ? lang(34) : lang(143)), $n, array(
        "select" => array(
            $a,
            $Yf
        )
    ), $Yf);
    $J = null;
    if ($_POST["save"])
        $J = (array) $_POST["fields"];
    elseif ($Z) {
        $L = array();
        foreach ($p as $B => $o) {
            if (isset($o["privileges"]["select"])) {
                $ya = convert_field($o);
                if ($_POST["clone"] && $o["auto_increment"])
                    $ya = "''";
                if ($w == "sql" && ereg("enum|set", $o["type"]))
                    $ya = "1*" . idf_escape($B);
                $L[] = ($ya ? "$ya AS " : "") . idf_escape($B);
            }
        }
        $J = array();
        if ($L) {
            $K = get_rows("SELECT" . limit(implode(", ", $L) . " FROM " . table($a), " WHERE $Z", (isset($_GET["select"]) ? 2 : 1)));
            $J = (isset($_GET["select"]) && count($K) != 1 ? null : reset($K));
        }
    }
    if ($J === false)
        echo "<p class='error'>" . lang(89) . "\n";
    echo '
<form action="" method="post" enctype="multipart/form-data" id="form">
';
    if (!$p)
        echo "<p class='error'>" . lang(144) . "\n";
    else {
        echo "<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";
        foreach ($p as $B => $o) {
            echo "<tr><th>" . $b->fieldName($o);
            $vb = $_GET["set"][bracket_escape($B)];
            if ($vb === null) {
                $vb = $o["default"];
                if ($o["type"] == "bit" && ereg("^b'([01]*)'\$", $vb, $jf))
                    $vb = $jf[1];
            }
            $Y = ($J !== null ? ($J[$B] != "" && $w == "sql" && ereg("enum|set", $o["type"]) ? (is_array($J[$B]) ? array_sum($J[$B]) : +$J[$B]) : $J[$B]) : (!$Lg && $o["auto_increment"] ? "" : (isset($_GET["select"]) ? false : $vb)));
            if (!$_POST["save"] && is_string($Y))
                $Y = $b->editVal($Y, $o);
            $r = ($_POST["save"] ? (string) $_POST["function"][$B] : ($Lg && $o["on_update"] == "CURRENT_TIMESTAMP" ? "now" : ($Y === false ? null : ($Y !== null ? '' : 'NULL'))));
            if (ereg("time", $o["type"]) && $Y == "CURRENT_TIMESTAMP") {
                $Y = "";
                $r = "now";
            }
            input($o, $Y, $r);
            echo "\n";
        }
        echo "</table>\n";
    }
    echo '<p>
';
    if ($p) {
        echo "<input type='submit' value='" . lang(145) . "'>\n";
        if (!isset($_GET["select"]))
            echo "<input type='submit' name='insert' value='" . ($Lg ? lang(146) : lang(147)) . "' title='Ctrl+Shift+Enter'>\n";
    }
    echo ($Lg ? "<input type='submit' name='delete' value='" . lang(148) . "' onclick=\"return confirm('" . lang(0) . "');\">\n" : ($_POST || !$p ? "" : "<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));
    if (isset($_GET["select"]))
        hidden_fields(array(
            "check" => (array) $_POST["check"],
            "clone" => $_POST["clone"],
            "all" => $_POST["all"]
        ));
    echo '<input type="hidden" name="referer" value="', h(isset($_POST["referer"]) ? $_POST["referer"] : $_SERVER["HTTP_REFERER"]), '">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["create"])) {
    $a  = $_GET["create"];
    $Ce = array(
        'HASH',
        'LINEAR HASH',
        'KEY',
        'LINEAR KEY',
        'RANGE',
        'LIST'
    );
    $ff = referencable_primary($a);
    $vc = array();
    foreach ($ff as $Yf => $o)
        $vc[str_replace("`", "``", $Yf) . "`" . str_replace("`", "``", $o["field"])] = $Yf;
    $ve = array();
    $Q  = array();
    if ($a != "") {
        $ve = fields($a);
        $Q  = table_status($a);
        if (!$Q)
            $n = lang(7);
    }
    $J           = $_POST;
    $J["fields"] = (array) $J["fields"];
    if ($J["auto_increment_col"])
        $J["fields"][$J["auto_increment_col"]]["auto_increment"] = true;
    if ($_POST && !process_fields($J["fields"]) && !$n) {
        if ($_POST["drop"])
            query_redirect("DROP TABLE " . table($a), substr(ME, 0, -1), lang(149));
        else {
            $p  = array();
            $wa = array();
            $Ng = false;
            $tc = array();
            ksort($J["fields"]);
            $ue = reset($ve);
            $ua = " FIRST";
            foreach ($J["fields"] as $x => $o) {
                $q  = $vc[$o["type"]];
                $Cg = ($q !== null ? $ff[$q] : $o);
                if ($o["field"] != "") {
                    if (!$o["has_default"])
                        $o["default"] = null;
                    if ($x == $J["auto_increment_col"])
                        $o["auto_increment"] = true;
                    $Xe   = process_field($o, $Cg);
                    $wa[] = array(
                        $o["orig"],
                        $Xe,
                        $ua
                    );
                    if ($Xe != process_field($ue, $ue)) {
                        $p[] = array(
                            $o["orig"],
                            $Xe,
                            $ua
                        );
                        if ($o["orig"] != "" || $ua)
                            $Ng = true;
                    }
                    if ($q !== null)
                        $tc[idf_escape($o["field"])] = ($a != "" && $w != "sqlite" ? "ADD" : " ") . " FOREIGN KEY (" . idf_escape($o["field"]) . ") REFERENCES " . table($vc[$o["type"]]) . " (" . idf_escape($Cg["field"]) . ")" . (ereg("^($he)\$", $o["on_delete"]) ? " ON DELETE $o[on_delete]" : "");
                    $ua = " AFTER " . idf_escape($o["field"]);
                } elseif ($o["orig"] != "") {
                    $Ng  = true;
                    $p[] = array(
                        $o["orig"]
                    );
                }
                if ($o["orig"] != "") {
                    $ue = next($ve);
                    if (!$ue)
                        $ua = "";
                }
            }
            $Ee = "";
            if (in_array($J["partition_by"], $Ce)) {
                $Fe = array();
                if ($J["partition_by"] == 'RANGE' || $J["partition_by"] == 'LIST') {
                    foreach (array_filter($J["partition_names"]) as $x => $X) {
                        $Y    = $J["partition_values"][$x];
                        $Fe[] = "\n  PARTITION " . idf_escape($X) . " VALUES " . ($J["partition_by"] == 'RANGE' ? "LESS THAN" : "IN") . ($Y != "" ? " ($Y)" : " MAXVALUE");
                    }
                }
                $Ee .= "\nPARTITION BY $J[partition_by]($J[partition])" . ($Fe ? " (" . implode(",", $Fe) . "\n)" : ($J["partitions"] ? " PARTITIONS " . (+$J["partitions"]) : ""));
            } elseif (support("partitioning") && ereg("partitioned", $Q["Create_options"]))
                $Ee .= "\nREMOVE PARTITIONING";
            $Jd = lang(150);
            if ($a == "") {
                cookie("adminer_engine", $J["Engine"]);
                $Jd = lang(151);
            }
            $B = trim($J["name"]);
            queries_redirect(ME . "table=" . urlencode($B), $Jd, alter_table($a, $B, ($w == "sqlite" && ($Ng || $tc) ? $wa : $p), $tc, $J["Comment"], ($J["Engine"] && $J["Engine"] != $Q["Engine"] ? $J["Engine"] : ""), ($J["Collation"] && $J["Collation"] != $Q["Collation"] ? $J["Collation"] : ""), ($J["Auto_increment"] != "" ? +$J["Auto_increment"] : ""), $Ee));
        }
    }
    page_header(($a != "" ? lang(31) : lang(152)), $n, array(
        "table" => $a
    ), $a);
    if (!$_POST) {
        $J = array(
            "Engine" => $_COOKIE["adminer_engine"],
            "fields" => array(
                array(
                    "field" => "",
                    "type" => (isset($U["int"]) ? "int" : (isset($U["integer"]) ? "integer" : ""))
                )
            ),
            "partition_names" => array(
                ""
            )
        );
        if ($a != "") {
            $J           = $Q;
            $J["name"]   = $a;
            $J["fields"] = array();
            if (!$_GET["auto_increment"])
                $J["Auto_increment"] = "";
            foreach ($ve as $o) {
                $o["has_default"] = isset($o["default"]);
                $J["fields"][]    = $o;
            }
            if (support("partitioning")) {
                $_c = "FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = " . q(DB) . " AND TABLE_NAME = " . q($a);
                $H  = $i->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $_c ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");
                list($J["partition_by"], $J["partitions"], $J["partition"]) = $H->fetch_row();
                $Fe                    = get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $_c AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");
                $Fe[""]                = "";
                $J["partition_names"]  = array_keys($Fe);
                $J["partition_values"] = array_values($Fe);
            }
        }
    }
    $Xa = collations();
    $Ub = engines();
    foreach ($Ub as $Tb) {
        if (!strcasecmp($Tb, $J["Engine"])) {
            $J["Engine"] = $Tb;
            break;
        }
    }
    echo '
<form action="" method="post" id="form">
<p>
', lang(153), ': <input name="name" maxlength="64" value="', h($J["name"]), '" autocapitalize="off">
';
    if ($a == "" && !$_POST) {
?><script type='text/javascript'>focus(document.getElementById('form')['name']);</script><?php
    }
    echo ($Ub ? html_select("Engine", array(
        "" => "(" . lang(154) . ")"
    ) + $Ub, $J["Engine"]) : ""), ' ', ($Xa && !ereg("sqlite|mssql", $w) ? html_select("Collation", array(
        "" => "(" . lang(91) . ")"
    ) + $Xa, $J["Collation"]) : ""), ' <input type="submit" value="', lang(145), '">
<table cellspacing="0" id="edit-fields" class="nowrap">
';
    $cb = ($_POST ? $_POST["comments"] : $J["Comment"] != "");
    if (!$_POST && !$cb) {
        foreach ($J["fields"] as $o) {
            if ($o["comment"] != "") {
                $cb = true;
                break;
            }
        }
    }
    edit_fields($J["fields"], $Xa, "TABLE", $vc, $cb);
    echo '</table>
<p>
', lang(99), ': <input type="number" name="Auto_increment" size="6" value="', h($J["Auto_increment"]), '">
', checkbox("defaults", 1, true, lang(100), "columnShow(this.checked, 5)", "jsonly");
    if (!$_POST["defaults"]) {
        echo '<script type="text/javascript">editingHideDefaults()</script>';
    }
    echo (support("comment") ? "<label><input type='checkbox' name='comments' value='1' class='jsonly' onclick=\"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();\"" . ($cb ? " checked" : "") . ">" . lang(101) . "</label>" . ' <input name="Comment" id="Comment" value="' . h($J["Comment"]) . '" maxlength="' . ($i->server_info >= 5.5 ? 2048 : 60) . '"' . ($cb ? '' : ' class="hidden"') . '>' : ''), '<p>
<input type="submit" value="', lang(145), '">
';
    if ($_GET["create"] != "") {
        echo '<input type="submit" name="drop" value="', lang(86), '"', confirm(), '>';
    }
    if (support("partitioning")) {
        $De = ereg('RANGE|LIST', $J["partition_by"]);
        print_fieldset("partition", lang(155), $J["partition_by"]);
        echo '<p>
', html_select("partition_by", array(
            -1 => ""
        ) + $Ce, $J["partition_by"], "partitionByChange(this);"), '(<input name="partition" value="', h($J["partition"]), '">)
', lang(156), ': <input type="number" name="partitions" class="size" value="', h($J["partitions"]), '"', ($De || !$J["partition_by"] ? " class='hidden'" : ""), '>
<table cellspacing="0" id="partition-table"', ($De ? "" : " class='hidden'"), '>
<thead><tr><th>', lang(157), '<th>', lang(158), '</thead>
';
        foreach ($J["partition_names"] as $x => $X) {
            echo '<tr>', '<td><input name="partition_names[]" value="' . h($X) . '"' . ($x == count($J["partition_names"]) - 1 ? ' onchange="partitionNameChange(this);"' : '') . ' autocapitalize="off">', '<td><input name="partition_values[]" value="' . h($J["partition_values"][$x]) . '">';
        }
        echo '</table>
</div></fieldset>
';
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["indexes"])) {
    $a  = $_GET["indexes"];
    $Tc = array(
        "PRIMARY",
        "UNIQUE",
        "INDEX"
    );
    $Q  = table_status($a, true);
    if (eregi("MyISAM|M?aria" . ($i->server_info >= 5.6 ? "|InnoDB" : ""), $Q["Engine"]))
        $Tc[] = "FULLTEXT";
    $v = indexes($a);
    if ($w == "sqlite") {
        unset($Tc[0]);
        unset($v[""]);
    }
    $J = $_POST;
    if ($_POST && !$n && !$_POST["add"]) {
        $c = array();
        foreach ($J["indexes"] as $u) {
            $B = $u["name"];
            if (in_array($u["type"], $Tc)) {
                $g  = array();
                $wd = array();
                $yb = array();
                $N  = array();
                ksort($u["columns"]);
                foreach ($u["columns"] as $x => $f) {
                    if ($f != "") {
                        $vd   = $u["lengths"][$x];
                        $xb   = $u["descs"][$x];
                        $N[]  = idf_escape($f) . ($vd ? "(" . (+$vd) . ")" : "") . ($xb ? " DESC" : "");
                        $g[]  = $f;
                        $wd[] = ($vd ? $vd : null);
                        $yb[] = $xb;
                    }
                }
                if ($g) {
                    $ec = $v[$B];
                    if ($ec) {
                        ksort($ec["columns"]);
                        ksort($ec["lengths"]);
                        ksort($ec["descs"]);
                        if ($u["type"] == $ec["type"] && array_values($ec["columns"]) === $g && (!$ec["lengths"] || array_values($ec["lengths"]) === $wd) && array_values($ec["descs"]) === $yb) {
                            unset($v[$B]);
                            continue;
                        }
                    }
                    $c[] = array(
                        $u["type"],
                        $B,
                        "(" . implode(", ", $N) . ")"
                    );
                }
            }
        }
        foreach ($v as $B => $ec)
            $c[] = array(
                $ec["type"],
                $B,
                "DROP"
            );
        if (!$c)
            redirect(ME . "table=" . urlencode($a));
        queries_redirect(ME . "table=" . urlencode($a), lang(159), alter_indexes($a, $c));
    }
    page_header(lang(109), $n, array(
        "table" => $a
    ), $a);
    $p = array_keys(fields($a));
    if ($_POST["add"]) {
        foreach ($J["indexes"] as $x => $u) {
            if ($u["columns"][count($u["columns"])] != "")
                $J["indexes"][$x]["columns"][] = "";
        }
        $u = end($J["indexes"]);
        if ($u["type"] || array_filter($u["columns"], 'strlen') || array_filter($u["lengths"], 'strlen') || array_filter($u["descs"]))
            $J["indexes"][] = array(
                "columns" => array(
                    1 => ""
                )
            );
    }
    if (!$J) {
        foreach ($v as $x => $u) {
            $v[$x]["name"]      = $x;
            $v[$x]["columns"][] = "";
        }
        $v[]          = array(
            "columns" => array(
                1 => ""
            )
        );
        $J["indexes"] = $v;
    }
    echo '
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th>', lang(160), '<th>', lang(161), '<th>', lang(162), '</thead>
';
    $gd = 1;
    foreach ($J["indexes"] as $u) {
        echo "<tr><td>" . html_select("indexes[$gd][type]", array(
            -1 => ""
        ) + $Tc, $u["type"], ($gd == count($J["indexes"]) ? "indexesAddRow(this);" : 1)) . "<td>";
        ksort($u["columns"]);
        $s = 1;
        foreach ($u["columns"] as $x => $f) {
            echo "<span>" . html_select("indexes[$gd][columns][$s]", array(
                -1 => ""
            ) + $p, $f, ($s == count($u["columns"]) ? "indexesAddColumn" : "indexesChangeColumn") . "(this, '" . js_escape($w == "sql" ? "" : $_GET["indexes"] . "_") . "');"), ($w == "sql" || $w == "mssql" ? "<input type='number' name='indexes[$gd][lengths][$s]' class='size' value='" . h($u["lengths"][$x]) . "'>" : ""), ($w != "sql" ? checkbox("indexes[$gd][descs][$s]", 1, $u["descs"][$x], lang(42)) : ""), " </span>";
            $s++;
        }
        echo "<td><input name='indexes[$gd][name]' value='" . h($u["name"]) . "' autocapitalize='off'>\n";
        $gd++;
    }
    echo '</table>
<p>
<input type="submit" value="', lang(145), '">
<noscript><p><input type="submit" name="add" value="', lang(102), '"></noscript>
<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["database"])) {
    $J = $_POST;
    if ($_POST && !$n && !isset($_POST["add_x"])) {
        restart_session();
        $B = trim($J["name"]);
        if ($_POST["drop"]) {
            $_GET["db"] = "";
            queries_redirect(remove_from_uri("db|database"), lang(163), drop_databases(array(
                DB
            )));
        } elseif (DB !== $B) {
            if (DB != "") {
                $_GET["db"] = $B;
                queries_redirect(preg_replace('~db=[^&]*&~', '', ME) . "db=" . urlencode($B), lang(164), rename_database($B, $J["collation"]));
            } else {
                $l  = explode("\n", str_replace("\r", "", $B));
                $Sf = true;
                $pd = "";
                foreach ($l as $m) {
                    if (count($l) == 1 || $m != "") {
                        if (!create_database($m, $J["collation"]))
                            $Sf = false;
                        $pd = $m;
                    }
                }
                queries_redirect(ME . "db=" . urlencode($pd), lang(165), $Sf);
            }
        } else {
            if (!$J["collation"])
                redirect(substr(ME, 0, -1));
            query_redirect("ALTER DATABASE " . idf_escape($B) . (eregi('^[a-z0-9_]+$', $J["collation"]) ? " COLLATE $J[collation]" : ""), substr(ME, 0, -1), lang(166));
        }
    }
    page_header(DB != "" ? lang(50) : lang(167), $n, array(), DB);
    $Xa = collations();
    $B  = DB;
    if ($_POST)
        $B = $J["name"];
    elseif (DB != "")
        $J["collation"] = db_collation(DB, $Xa);
    elseif ($w == "sql") {
        foreach (get_vals("SHOW GRANTS") as $Dc) {
            if (preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~', $Dc, $A) && $A[1]) {
                $B = stripcslashes(idf_unescape("`$A[2]`"));
                break;
            }
        }
    }
    echo '
<form action="" method="post">
<p>
', ($_POST["add_x"] || strpos($B, "\n") ? '<textarea id="name" name="name" rows="10" cols="40">' . h($B) . '</textarea><br>' : '<input name="name" id="name" value="' . h($B) . '" maxlength="64" autocapitalize="off">') . "\n" . ($Xa ? html_select("collation", array(
        "" => "(" . lang(91) . ")"
    ) + $Xa, $J["collation"]) : "");
?>
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php
    echo lang(145), '">
';
    if (DB != "")
        echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
    elseif (!$_POST["add_x"] && $_GET["db"] == "")
        echo "<input type='image' name='add' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(102) . "'>\n";
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["scheme"])) {
    $J = $_POST;
    if ($_POST && !$n) {
        $z = preg_replace('~ns=[^&]*&~', '', ME) . "ns=";
        if ($_POST["drop"])
            query_redirect("DROP SCHEMA " . idf_escape($_GET["ns"]), $z, lang(168));
        else {
            $B = trim($J["name"]);
            $z .= urlencode($B);
            if ($_GET["ns"] == "")
                query_redirect("CREATE SCHEMA " . idf_escape($B), $z, lang(169));
            elseif ($_GET["ns"] != $B)
                query_redirect("ALTER SCHEMA " . idf_escape($_GET["ns"]) . " RENAME TO " . idf_escape($B), $z, lang(170));
            else
                redirect($z);
        }
    }
    page_header($_GET["ns"] != "" ? lang(51) : lang(52), $n);
    if (!$J)
        $J["name"] = $_GET["ns"];
    echo '
<form action="" method="post">
<p><input name="name" id="name" value="', h($J["name"]);
?>" autocapitalize="off">
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php
    echo lang(145), '">
';
    if ($_GET["ns"] != "")
        echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["call"])) {
    $da = $_GET["call"];
    page_header(lang(171) . ": " . h($da), $n);
    $sf = routine($da, (isset($_GET["callf"]) ? "FUNCTION" : "PROCEDURE"));
    $Rc = array();
    $xe = array();
    foreach ($sf["fields"] as $s => $o) {
        if (substr($o["inout"], -3) == "OUT")
            $xe[$s] = "@" . idf_escape($o["field"]) . " AS " . idf_escape($o["field"]);
        if (!$o["inout"] || substr($o["inout"], 0, 2) == "IN")
            $Rc[] = $s;
    }
    if (!$n && $_POST) {
        $Ma = array();
        foreach ($sf["fields"] as $x => $o) {
            if (in_array($x, $Rc)) {
                $X = process_input($o);
                if ($X === false)
                    $X = "''";
                if (isset($xe[$x]))
                    $i->query("SET @" . idf_escape($o["field"]) . " = $X");
            }
            $Ma[] = (isset($xe[$x]) ? "@" . idf_escape($o["field"]) : $X);
        }
        $G = (isset($_GET["callf"]) ? "SELECT" : "CALL") . " " . idf_escape($da) . "(" . implode(", ", $Ma) . ")";
        echo "<p><code class='jush-$w'>" . h($G) . "</code> <a href='" . h(ME) . "sql=" . urlencode($G) . "'>" . lang(34) . "</a>\n";
        if (!$i->multi_query($G))
            echo "<p class='error'>" . error() . "\n";
        else {
            $j = connect();
            if (is_object($j))
                $j->select_db(DB);
            do {
                $H = $i->store_result();
                if (is_object($H))
                    select($H, $j);
                else
                    echo "<p class='message'>" . lang(172, $i->affected_rows) . "\n";
            } while ($i->next_result());
            if ($xe)
                select($i->query("SELECT " . implode(", ", $xe)));
        }
    }
    echo '
<form action="" method="post">
';
    if ($Rc) {
        echo "<table cellspacing='0'>\n";
        foreach ($Rc as $x) {
            $o = $sf["fields"][$x];
            $B = $o["field"];
            echo "<tr><th>" . $b->fieldName($o);
            $Y = $_POST["fields"][$B];
            if ($Y != "") {
                if ($o["type"] == "enum")
                    $Y = +$Y;
                if ($o["type"] == "set")
                    $Y = array_sum($Y);
            }
            input($o, $Y, (string) $_POST["function"][$B]);
            echo "\n";
        }
        echo "</table>\n";
    }
    echo '<p>
<input type="submit" value="', lang(171), '">
<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["foreign"])) {
    $a = $_GET["foreign"];
    $B = $_GET["name"];
    $J = $_POST;
    if ($_POST && !$n && !$_POST["add"] && !$_POST["change"] && !$_POST["change-js"]) {
        if ($_POST["drop"])
            query_redirect("ALTER TABLE " . table($a) . "\nDROP " . ($w == "sql" ? "FOREIGN KEY " : "CONSTRAINT ") . idf_escape($B), ME . "table=" . urlencode($a), lang(173));
        else {
            $If = array_filter($J["source"], 'strlen');
            ksort($If);
            $fg = array();
            foreach ($If as $x => $X)
                $fg[$x] = $J["target"][$x];
            query_redirect("ALTER TABLE " . table($a) . ($B != "" ? "\nDROP " . ($w == "sql" ? "FOREIGN KEY " : "CONSTRAINT ") . idf_escape($B) . "," : "") . "\nADD FOREIGN KEY (" . implode(", ", array_map('idf_escape', $If)) . ") REFERENCES " . table($J["table"]) . " (" . implode(", ", array_map('idf_escape', $fg)) . ")" . (ereg("^($he)\$", $J["on_delete"]) ? " ON DELETE $J[on_delete]" : "") . (ereg("^($he)\$", $J["on_update"]) ? " ON UPDATE $J[on_update]" : ""), ME . "table=" . urlencode($a), ($B != "" ? lang(174) : lang(175)));
            $n = lang(176) . "<br>$n";
        }
    }
    page_header(lang(177), $n, array(
        "table" => $a
    ), $a);
    if ($_POST) {
        ksort($J["source"]);
        if ($_POST["add"])
            $J["source"][] = "";
        elseif ($_POST["change"] || $_POST["change-js"])
            $J["target"] = array();
    } elseif ($B != "") {
        $vc            = foreign_keys($a);
        $J             = $vc[$B];
        $J["source"][] = "";
    } else {
        $J["table"]  = $a;
        $J["source"] = array(
            ""
        );
    }
    $If = array_keys(fields($a));
    $fg = ($a === $J["table"] ? $If : array_keys(fields($J["table"])));
    $ef = array_keys(array_filter(table_status('', true), 'fk_support'));
    echo '
<form action="" method="post">
<p>
';
    if ($J["db"] == "" && $J["ns"] == "") {
        echo lang(178), ':
', html_select("table", $ef, $J["table"], "this.form['change-js'].value = '1'; this.form.submit();"), '<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="', lang(179), '"></noscript>
<table cellspacing="0">
<thead><tr><th>', lang(111), '<th>', lang(112), '</thead>
';
        $gd = 0;
        foreach ($J["source"] as $x => $X) {
            echo "<tr>", "<td>" . html_select("source[" . (+$x) . "]", array(
                -1 => ""
            ) + $If, $X, ($gd == count($J["source"]) - 1 ? "foreignAddRow(this);" : 1)), "<td>" . html_select("target[" . (+$x) . "]", $fg, $J["target"][$x]);
            $gd++;
        }
        echo '</table>
<p>
', lang(93), ': ', html_select("on_delete", array(
            -1 => ""
        ) + explode("|", $he), $J["on_delete"]), ' ', lang(92), ': ', html_select("on_update", array(
            -1 => ""
        ) + explode("|", $he), $J["on_update"]), '<p>
<input type="submit" value="', lang(145), '">
<noscript><p><input type="submit" name="add" value="', lang(180), '"></noscript>
';
    }
    if ($B != "") {
        echo '<input type="submit" name="drop" value="', lang(86), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["view"])) {
    $a = $_GET["view"];
    $J = $_POST;
    if ($_POST && !$n) {
        $B  = trim($J["name"]);
        $ya = " AS\n$J[select]";
        $_  = ME . "table=" . urlencode($B);
        $Jd = lang(181);
        if (!$_POST["drop"] && $a == $B && $w != "sqlite")
            query_redirect(($w == "mssql" ? "ALTER" : "CREATE OR REPLACE") . " VIEW " . table($B) . $ya, $_, $Jd);
        else {
            $hg = $B . "_adminer_" . uniqid();
            drop_create("DROP VIEW " . table($a), "CREATE VIEW " . table($B) . $ya, "DROP VIEW " . table($B), "CREATE VIEW " . table($hg) . $ya, "DROP VIEW " . table($hg), ($_POST["drop"] ? substr(ME, 0, -1) : $_), lang(182), $Jd, lang(183), $a, $B);
        }
    }
    if (!$_POST && $a != "") {
        $J         = view($a);
        $J["name"] = $a;
        if (!$n)
            $n = $i->error;
    }
    page_header(($a != "" ? lang(30) : lang(184)), $n, array(
        "table" => $a
    ), $a);
    echo '
<form action="" method="post">
<p>', lang(162), ': <input name="name" value="', h($J["name"]), '" maxlength="64" autocapitalize="off">
<p>';
    textarea("select", $J["select"]);
    echo '<p>
<input type="submit" value="', lang(145), '">
';
    if ($_GET["view"] != "") {
        echo '<input type="submit" name="drop" value="', lang(86), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["event"])) {
    $aa = $_GET["event"];
    $bd = array(
        "YEAR",
        "QUARTER",
        "MONTH",
        "DAY",
        "HOUR",
        "MINUTE",
        "WEEK",
        "SECOND",
        "YEAR_MONTH",
        "DAY_HOUR",
        "DAY_MINUTE",
        "DAY_SECOND",
        "HOUR_MINUTE",
        "HOUR_SECOND",
        "MINUTE_SECOND"
    );
    $Of = array(
        "ENABLED" => "ENABLE",
        "DISABLED" => "DISABLE",
        "SLAVESIDE_DISABLED" => "DISABLE ON SLAVE"
    );
    $J  = $_POST;
    if ($_POST && !$n) {
        if ($_POST["drop"])
            query_redirect("DROP EVENT " . idf_escape($aa), substr(ME, 0, -1), lang(185));
        elseif (in_array($J["INTERVAL_FIELD"], $bd) && isset($Of[$J["STATUS"]])) {
            $xf = "\nON SCHEDULE " . ($J["INTERVAL_VALUE"] ? "EVERY " . q($J["INTERVAL_VALUE"]) . " $J[INTERVAL_FIELD]" . ($J["STARTS"] ? " STARTS " . q($J["STARTS"]) : "") . ($J["ENDS"] ? " ENDS " . q($J["ENDS"]) : "") : "AT " . q($J["STARTS"])) . " ON COMPLETION" . ($J["ON_COMPLETION"] ? "" : " NOT") . " PRESERVE";
            queries_redirect(substr(ME, 0, -1), ($aa != "" ? lang(186) : lang(187)), queries(($aa != "" ? "ALTER EVENT " . idf_escape($aa) . $xf . ($aa != $J["EVENT_NAME"] ? "\nRENAME TO " . idf_escape($J["EVENT_NAME"]) : "") : "CREATE EVENT " . idf_escape($J["EVENT_NAME"]) . $xf) . "\n" . $Of[$J["STATUS"]] . " COMMENT " . q($J["EVENT_COMMENT"]) . rtrim(" DO\n$J[EVENT_DEFINITION]", ";") . ";"));
        }
    }
    page_header(($aa != "" ? lang(188) . ": " . h($aa) : lang(189)), $n);
    if (!$J && $aa != "") {
        $K = get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = " . q(DB) . " AND EVENT_NAME = " . q($aa));
        $J = reset($K);
    }
    echo '
<form action="" method="post">
<table cellspacing="0">
<tr><th>', lang(162), '<td><input name="EVENT_NAME" value="', h($J["EVENT_NAME"]), '" maxlength="64" autocapitalize="off">
<tr><th title="datetime">', lang(190), '<td><input name="STARTS" value="', h("$J[EXECUTE_AT]$J[STARTS]"), '">
<tr><th title="datetime">', lang(191), '<td><input name="ENDS" value="', h($J["ENDS"]), '">
<tr><th>', lang(192), '<td><input type="number" name="INTERVAL_VALUE" value="', h($J["INTERVAL_VALUE"]), '" class="size"> ', html_select("INTERVAL_FIELD", $bd, $J["INTERVAL_FIELD"]), '<tr><th>', lang(80), '<td>', html_select("STATUS", $Of, $J["STATUS"]), '<tr><th>', lang(101), '<td><input name="EVENT_COMMENT" value="', h($J["EVENT_COMMENT"]), '" maxlength="64">
<tr><th>&nbsp;<td>', checkbox("ON_COMPLETION", "PRESERVE", $J["ON_COMPLETION"] == "PRESERVE", lang(193)), '</table>
<p>';
    textarea("EVENT_DEFINITION", $J["EVENT_DEFINITION"]);
    echo '<p>
<input type="submit" value="', lang(145), '">
';
    if ($aa != "") {
        echo '<input type="submit" name="drop" value="', lang(86), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["procedure"])) {
    $da          = $_GET["procedure"];
    $sf          = (isset($_GET["function"]) ? "FUNCTION" : "PROCEDURE");
    $J           = $_POST;
    $J["fields"] = (array) $J["fields"];
    if ($_POST && !process_fields($J["fields"]) && !$n) {
        $hg = "$J[name]_adminer_" . uniqid();
        drop_create("DROP $sf " . idf_escape($da), create_routine($sf, $J), "DROP $sf " . idf_escape($J["name"]), create_routine($sf, array(
            "name" => $hg
        ) + $J), "DROP $sf " . idf_escape($hg), substr(ME, 0, -1), lang(194), lang(195), lang(196), $da, $J["name"]);
    }
    page_header(($da != "" ? (isset($_GET["function"]) ? lang(197) : lang(198)) . ": " . h($da) : (isset($_GET["function"]) ? lang(199) : lang(200))), $n);
    if (!$_POST && $da != "") {
        $J         = routine($da, $sf);
        $J["name"] = $da;
    }
    $Xa = get_vals("SHOW CHARACTER SET");
    sort($Xa);
    $tf = routine_languages();
    echo '
<form action="" method="post" id="form">
<p>', lang(162), ': <input name="name" value="', h($J["name"]), '" maxlength="64" autocapitalize="off">
', ($tf ? lang(9) . ": " . html_select("language", $tf, $J["language"]) : ""), '<table cellspacing="0" class="nowrap">
';
    edit_fields($J["fields"], $Xa, $sf);
    if (isset($_GET["function"])) {
        echo "<tr><td>" . lang(201);
        edit_type("returns", $J["returns"], $Xa);
    }
    echo '</table>
<p>';
    textarea("definition", $J["definition"]);
    echo '<p>
<input type="submit" value="', lang(145), '">
';
    if ($da != "") {
        echo '<input type="submit" name="drop" value="', lang(86), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["sequence"])) {
    $fa = $_GET["sequence"];
    $J  = $_POST;
    if ($_POST && !$n) {
        $z = substr(ME, 0, -1);
        $B = trim($J["name"]);
        if ($_POST["drop"])
            query_redirect("DROP SEQUENCE " . idf_escape($fa), $z, lang(202));
        elseif ($fa == "")
            query_redirect("CREATE SEQUENCE " . idf_escape($B), $z, lang(203));
        elseif ($fa != $B)
            query_redirect("ALTER SEQUENCE " . idf_escape($fa) . " RENAME TO " . idf_escape($B), $z, lang(204));
        else
            redirect($z);
    }
    page_header($fa != "" ? lang(205) . ": " . h($fa) : lang(206), $n);
    if (!$J)
        $J["name"] = $fa;
    echo '
<form action="" method="post">
<p><input name="name" value="', h($J["name"]), '" autocapitalize="off">
<input type="submit" value="', lang(145), '">
';
    if ($fa != "")
        echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["type"])) {
    $ga = $_GET["type"];
    $J  = $_POST;
    if ($_POST && !$n) {
        $z = substr(ME, 0, -1);
        if ($_POST["drop"])
            query_redirect("DROP TYPE " . idf_escape($ga), $z, lang(207));
        else
            query_redirect("CREATE TYPE " . idf_escape(trim($J["name"])) . " $J[as]", $z, lang(208));
    }
    page_header($ga != "" ? lang(209) . ": " . h($ga) : lang(210), $n);
    if (!$J)
        $J["as"] = "AS ";
    echo '
<form action="" method="post">
<p>
';
    if ($ga != "")
        echo "<input type='submit' name='drop' value='" . lang(86) . "'" . confirm() . ">\n";
    else {
        echo "<input name='name' value='" . h($J['name']) . "' autocapitalize='off'>\n";
        textarea("as", $J["as"]);
        echo "<p><input type='submit' value='" . lang(145) . "'>\n";
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["trigger"])) {
    $a  = $_GET["trigger"];
    $B  = $_GET["name"];
    $Ag = trigger_options();
    $zg = array(
        "INSERT",
        "UPDATE",
        "DELETE"
    );
    $J  = (array) trigger($B) + array(
        "Trigger" => $a . "_bi"
    );
    if ($_POST) {
        if (!$n && in_array($_POST["Timing"], $Ag["Timing"]) && in_array($_POST["Event"], $zg) && in_array($_POST["Type"], $Ag["Type"])) {
            $ge = " ON " . table($a);
            $Fb = "DROP TRIGGER " . idf_escape($B) . ($w == "pgsql" ? $ge : "");
            $_  = ME . "table=" . urlencode($a);
            if ($_POST["drop"])
                query_redirect($Fb, $_, lang(211));
            else {
                if ($B != "")
                    queries($Fb);
                queries_redirect($_, ($B != "" ? lang(212) : lang(213)), queries(create_trigger($ge, $_POST)));
                if ($B != "")
                    queries(create_trigger($ge, $J + array(
                        "Type" => reset($Ag["Type"])
                    )));
            }
        }
        $J = $_POST;
    }
    page_header(($B != "" ? lang(214) . ": " . h($B) : lang(215)), $n, array(
        "table" => $a
    ));
    echo '
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>', lang(216), '<td>', html_select("Timing", $Ag["Timing"], $J["Timing"], "if (/^" . preg_quote($a, "/") . "_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '" . js_escape($a) . "_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"), '<tr><th>', lang(217), '<td>', html_select("Event", $zg, $J["Event"], "this.form['Timing'].onchange();"), '<tr><th>', lang(96), '<td>', html_select("Type", $Ag["Type"], $J["Type"]), '</table>
<p>', lang(162), ': <input name="Trigger" value="', h($J["Trigger"]), '" maxlength="64" autocapitalize="off">
<p>';
    textarea("Statement", $J["Statement"]);
    echo '<p>
<input type="submit" value="', lang(145), '">
';
    if ($B != "") {
        echo '<input type="submit" name="drop" value="', lang(86), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["user"])) {
    $ha = $_GET["user"];
    $Ve = array(
        "" => array(
            "All privileges" => ""
        )
    );
    foreach (get_rows("SHOW PRIVILEGES") as $J) {
        foreach (explode(",", ($J["Privilege"] == "Grant option" ? "" : $J["Context"])) as $hb)
            $Ve[$hb][$J["Privilege"]] = $J["Comment"];
    }
    $Ve["Server Admin"] += $Ve["File access on server"];
    $Ve["Databases"]["Create routine"] = $Ve["Procedures"]["Create routine"];
    unset($Ve["Procedures"]["Create routine"]);
    $Ve["Columns"] = array();
    foreach (array(
        "Select",
        "Insert",
        "Update",
        "References"
    ) as $X)
        $Ve["Columns"][$X] = $Ve["Tables"][$X];
    unset($Ve["Server Admin"]["Usage"]);
    foreach ($Ve["Tables"] as $x => $X)
        unset($Ve["Databases"][$x]);
    $Vd = array();
    if ($_POST) {
        foreach ($_POST["objects"] as $x => $X)
            $Vd[$X] = (array) $Vd[$X] + (array) $_POST["grants"][$x];
    }
    $Ec = array();
    $ee = "";
    if (isset($_GET["host"]) && ($H = $i->query("SHOW GRANTS FOR " . q($ha) . "@" . q($_GET["host"])))) {
        while ($J = $H->fetch_row()) {
            if (preg_match('~GRANT (.*) ON (.*) TO ~', $J[0], $A) && preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~', $A[1], $Bd, PREG_SET_ORDER)) {
                foreach ($Bd as $X) {
                    if ($X[1] != "USAGE")
                        $Ec["$A[2]$X[2]"][$X[1]] = true;
                    if (ereg(' WITH GRANT OPTION', $J[0]))
                        $Ec["$A[2]$X[2]"]["GRANT OPTION"] = true;
                }
            }
            if (preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~", $J[0], $A))
                $ee = $A[1];
        }
    }
    if ($_POST && !$n) {
        $fe = (isset($_GET["host"]) ? q($ha) . "@" . q($_GET["host"]) : "''");
        if ($_POST["drop"])
            query_redirect("DROP USER $fe", ME . "privileges=", lang(218));
        else {
            $Xd = q($_POST["user"]) . "@" . q($_POST["host"]);
            $Ge = $_POST["pass"];
            if ($Ge != '' && !$_POST["hashed"]) {
                $Ge = $i->result("SELECT PASSWORD(" . q($Ge) . ")");
                $n  = !$Ge;
            }
            $lb = false;
            if (!$n) {
                if ($fe != $Xd) {
                    $lb = queries(($i->server_info < 5 ? "GRANT USAGE ON *.* TO" : "CREATE USER") . " $Xd IDENTIFIED BY PASSWORD " . q($Ge));
                    $n  = !$lb;
                } elseif ($Ge != $ee)
                    queries("SET PASSWORD FOR $Xd = " . q($Ge));
            }
            if (!$n) {
                $pf = array();
                foreach ($Vd as $ae => $Dc) {
                    if (isset($_GET["grant"]))
                        $Dc = array_filter($Dc);
                    $Dc = array_keys($Dc);
                    if (isset($_GET["grant"]))
                        $pf = array_diff(array_keys(array_filter($Vd[$ae], 'strlen')), $Dc);
                    elseif ($fe == $Xd) {
                        $ce = array_keys((array) $Ec[$ae]);
                        $pf = array_diff($ce, $Dc);
                        $Dc = array_diff($Dc, $ce);
                        unset($Ec[$ae]);
                    }
                    if (preg_match('~^(.+)\\s*(\\(.*\\))?$~U', $ae, $A) && (!grant("REVOKE", $pf, $A[2], " ON $A[1] FROM $Xd") || !grant("GRANT", $Dc, $A[2], " ON $A[1] TO $Xd"))) {
                        $n = true;
                        break;
                    }
                }
            }
            if (!$n && isset($_GET["host"])) {
                if ($fe != $Xd)
                    queries("DROP USER $fe");
                elseif (!isset($_GET["grant"])) {
                    foreach ($Ec as $ae => $pf) {
                        if (preg_match('~^(.+)(\\(.*\\))?$~U', $ae, $A))
                            grant("REVOKE", array_keys($pf), $A[2], " ON $A[1] FROM $Xd");
                    }
                }
            }
            queries_redirect(ME . "privileges=", (isset($_GET["host"]) ? lang(219) : lang(220)), !$n);
            if ($lb)
                $i->query("DROP USER $Xd");
        }
    }
    page_header((isset($_GET["host"]) ? lang(23) . ": " . h("$ha@$_GET[host]") : lang(124)), $n, array(
        "privileges" => array(
            '',
            lang(54)
        )
    ));
    if ($_POST) {
        $J  = $_POST;
        $Ec = $Vd;
    } else {
        $J         = $_GET + array(
            "host" => $i->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)")
        );
        $J["pass"] = $ee;
        if ($ee != "")
            $J["hashed"] = true;
        $Ec[(DB == "" || $Ec ? "" : idf_escape(addcslashes(DB, "%_\\"))) . ".*"] = array();
    }
    echo '<form action="" method="post">
<table cellspacing="0">
<tr><th>', lang(22), '<td><input name="host" maxlength="60" value="', h($J["host"]), '" autocapitalize="off">
<tr><th>', lang(23), '<td><input name="user" maxlength="16" value="', h($J["user"]), '" autocapitalize="off">
<tr><th>', lang(24), '<td><input name="pass" id="pass" value="', h($J["pass"]), '">
';
    if (!$J["hashed"]) {
        echo '<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';
    }
    echo checkbox("hashed", 1, $J["hashed"], lang(221), "typePassword(this.form['pass'], this.checked);"), '</table>

';
    echo "<table cellspacing='0'>\n", "<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/" . substr($i->server_info, 0, 3) . "/en/grant.html#priv_level' target='_blank' rel='noreferrer' class='help'>" . lang(54) . "</a>";
    $s = 0;
    foreach ($Ec as $ae => $Dc) {
        echo '<th>' . ($ae != "*.*" ? "<input name='objects[$s]' value='" . h($ae) . "' size='10' autocapitalize='off'>" : "<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");
        $s++;
    }
    echo "</thead>\n";
    foreach (array(
        "" => "",
        "Server Admin" => lang(22),
        "Databases" => lang(25),
        "Tables" => lang(107),
        "Columns" => lang(108),
        "Procedures" => lang(222)
    ) as $hb => $xb) {
        foreach ((array) $Ve[$hb] as $Ue => $bb) {
            echo "<tr" . odd() . "><td" . ($xb ? ">$xb<td" : " colspan='2'") . ' lang="en" title="' . h($bb) . '">' . h($Ue);
            $s = 0;
            foreach ($Ec as $ae => $Dc) {
                $B = "'grants[$s][" . h(strtoupper($Ue)) . "]'";
                $Y = $Dc[strtoupper($Ue)];
                if ($hb == "Server Admin" && $ae != (isset($Ec["*.*"]) ? "*.*" : ".*"))
                    echo "<td>&nbsp;";
                elseif (isset($_GET["grant"]))
                    echo "<td><select name=$B><option><option value='1'" . ($Y ? " selected" : "") . ">" . lang(223) . "<option value='0'" . ($Y == "0" ? " selected" : "") . ">" . lang(224) . "</select>";
                else
                    echo "<td align='center'><label class='block'><input type='checkbox' name=$B value='1'" . ($Y ? " checked" : "") . ($Ue == "All privileges" ? " id='grants-$s-all'" : ($Ue == "Grant option" ? "" : " onclick=\"if (this.checked) formUncheck('grants-$s-all');\"")) . "></label>";
                $s++;
            }
        }
    }
    echo "</table>\n", '<p>
<input type="submit" value="', lang(145), '">
';
    if (isset($_GET["host"])) {
        echo '<input type="submit" name="drop" value="', lang(86), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["processlist"])) {
    if (support("kill") && $_POST && !$n) {
        $ld = 0;
        foreach ((array) $_POST["kill"] as $X) {
            if (queries("KILL " . (+$X)))
                $ld++;
        }
        queries_redirect(ME . "processlist=", lang(225, $ld), $ld || !$_POST["kill"]);
    }
    page_header(lang(78), $n);
    echo '
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" ondblclick="tableClick(event, true);" class="nowrap checkable">
';
    $s = -1;
    foreach (process_list() as $s => $J) {
        if (!$s) {
            echo "<thead><tr lang='en'>" . (support("kill") ? "<th>&nbsp;" : "");
            foreach ($J as $x => $X)
                echo "<th>" . ($w == "sql" ? "<a href='http://dev.mysql.com/doc/refman/" . substr($i->server_info, 0, 3) . "/en/show-processlist.html#processlist_" . strtolower($x) . "' target='_blank' rel='noreferrer' class='help'>$x</a>" : $x);
            echo "</thead>\n";
        }
        echo "<tr" . odd() . ">" . (support("kill") ? "<td>" . checkbox("kill[]", $J["Id"], 0) : "");
        foreach ($J as $x => $X)
            echo "<td>" . (($w == "sql" && $x == "Info" && ereg("Query|Killed", $J["Command"]) && $X != "") || ($w == "pgsql" && $x == "current_query" && $X != "<IDLE>") || ($w == "oracle" && $x == "sql_text" && $X != "") ? "<code class='jush-$w'>" . shorten_utf8($X, 100, "</code>") . ' <a href="' . h(ME . ($J["db"] != "" ? "db=" . urlencode($J["db"]) . "&" : "") . "sql=" . urlencode($X)) . '">' . lang(226) . '</a>' : nbsp($X));
        echo "\n";
    }
    echo '</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';
    if (support("kill")) {
        echo ($s + 1) . "/" . lang(227, $i->result("SELECT @@max_connections")), "<p><input type='submit' value='" . lang(228) . "'>\n";
    }
    echo '<input type="hidden" name="token" value="', $S, '">
</form>
';
} elseif (isset($_GET["select"])) {
    $a  = $_GET["select"];
    $Q  = table_status1($a);
    $v  = indexes($a);
    $p  = fields($a);
    $vc = column_foreign_keys($a);
    $be = "";
    if ($Q["Oid"]) {
        $be  = ($w == "sqlite" ? "rowid" : "oid");
        $v[] = array(
            "type" => "PRIMARY",
            "columns" => array(
                $be
            )
        );
    }
    parse_str($_COOKIE["adminer_import"], $ra);
    $qf = array();
    $g  = array();
    $kg = null;
    foreach ($p as $x => $o) {
        $B = $b->fieldName($o);
        if (isset($o["privileges"]["select"]) && $B != "") {
            $g[$x] = html_entity_decode(strip_tags($B), ENT_QUOTES);
            if (is_shortable($o))
                $kg = $b->selectLengthProcess();
        }
        $qf += $o["privileges"];
    }
    list($L, $Fc) = $b->selectColumnsProcess($g, $v);
    $cd = count($Fc) < count($L);
    $Z  = $b->selectSearchProcess($p, $v);
    $pe = $b->selectOrderProcess($p, $v);
    $y  = $b->selectLimitProcess();
    $_c = ($L ? implode(", ", $L) : "*" . ($be ? ", $be" : "")) . convert_fields($g, $p, $L) . "\nFROM " . table($a);
    $Gc = ($Fc && $cd ? "\nGROUP BY " . implode(", ", $Fc) : "") . ($pe ? "\nORDER BY " . implode(", ", $pe) : "");
    if ($_GET["val"] && is_ajax()) {
        header("Content-Type: text/plain; charset=utf-8");
        foreach ($_GET["val"] as $Hg => $J) {
            $ya = convert_field($p[key($J)]);
            echo $i->result("SELECT" . limit($ya ? $ya : idf_escape(key($J)) . " FROM " . table($a), " WHERE " . where_check($Hg, $p) . ($Z ? " AND " . implode(" AND ", $Z) : "") . ($pe ? " ORDER BY " . implode(", ", $pe) : ""), 1));
        }
        exit;
    }
    if ($_POST && !$n) {
        $ah = $Z;
        if (is_array($_POST["check"]))
            $ah[] = "((" . implode(") OR (", array_map('where_check', $_POST["check"])) . "))";
        $ah = ($ah ? "\nWHERE " . implode(" AND ", $ah) : "");
        $Qe = $Jg = null;
        foreach ($v as $u) {
            if ($u["type"] == "PRIMARY") {
                $Qe = array_flip($u["columns"]);
                $Jg = ($L ? $Qe : array());
                break;
            }
        }
        foreach ((array) $Jg as $x => $X) {
            if (in_array(idf_escape($x), $L))
                unset($Jg[$x]);
        }
        if ($_POST["export"]) {
            cookie("adminer_import", "output=" . urlencode($_POST["output"]) . "&format=" . urlencode($_POST["format"]));
            dump_headers($a);
            $b->dumpTable($a, "");
            if (!is_array($_POST["check"]) || $Jg === array())
                $G = "SELECT $_c$ah$Gc";
            else {
                $Fg = array();
                foreach ($_POST["check"] as $X)
                    $Fg[] = "(SELECT" . limit($_c, "\nWHERE " . ($Z ? implode(" AND ", $Z) . " AND " : "") . where_check($X, $p) . $Gc, 1) . ")";
                $G = implode(" UNION ALL ", $Fg);
            }
            $b->dumpData($a, "table", $G);
            exit;
        }
        if (!$b->selectEmailProcess($Z, $vc)) {
            if ($_POST["save"] || $_POST["delete"]) {
                $H  = true;
                $sa = 0;
                $G  = table($a);
                $N  = array();
                if (!$_POST["delete"]) {
                    foreach ($g as $B => $X) {
                        $X = process_input($p[$B]);
                        if ($X !== null) {
                            if ($_POST["clone"])
                                $N[idf_escape($B)] = ($X !== false ? $X : idf_escape($B));
                            elseif ($X !== false)
                                $N[] = idf_escape($B) . " = $X";
                        }
                    }
                    $G .= ($_POST["clone"] ? " (" . implode(", ", array_keys($N)) . ")\nSELECT " . implode(", ", $N) . "\nFROM " . table($a) : " SET\n" . implode(",\n", $N));
                }
                if ($_POST["delete"] || $N) {
                    $Za = "UPDATE";
                    if ($_POST["delete"]) {
                        $Za = "DELETE";
                        $G  = "FROM $G";
                    }
                    if ($_POST["clone"]) {
                        $Za = "INSERT";
                        $G  = "INTO $G";
                    }
                    if ($_POST["all"] || ($Jg === array() && is_array($_POST["check"])) || $cd) {
                        $H  = queries("$Za $G$ah");
                        $sa = $i->affected_rows;
                    } else {
                        foreach ((array) $_POST["check"] as $X) {
                            $H = queries($Za . limit1($G, "\nWHERE " . ($Z ? implode(" AND ", $Z) . " AND " : "") . where_check($X, $p)));
                            if (!$H)
                                break;
                            $sa += $i->affected_rows;
                        }
                    }
                }
                $Jd = lang(229, $sa);
                if ($_POST["clone"] && $H && $sa == 1) {
                    $qd = last_id();
                    if ($qd)
                        $Jd = lang(142, " $qd");
                }
                queries_redirect(remove_from_uri($_POST["all"] && $_POST["delete"] ? "page" : ""), $Jd, $H);
            } elseif (!$_POST["import"]) {
                if (!$_POST["val"])
                    $n = lang(230);
                else {
                    $H  = true;
                    $sa = 0;
                    foreach ($_POST["val"] as $Hg => $J) {
                        $N = array();
                        foreach ($J as $x => $X) {
                            $x   = bracket_escape($x, 1);
                            $N[] = idf_escape($x) . " = " . (ereg('char|text', $p[$x]["type"]) || $X != "" ? $b->processInput($p[$x], $X) : "NULL");
                        }
                        $G  = table($a) . " SET " . implode(", ", $N);
                        $Zg = " WHERE " . where_check($Hg, $p) . ($Z ? " AND " . implode(" AND ", $Z) : "");
                        $H  = queries("UPDATE" . ($cd || $Jg === array() ? " $G$Zg" : limit1($G, $Zg)));
                        if (!$H)
                            break;
                        $sa += $i->affected_rows;
                    }
                    queries_redirect(remove_from_uri(), lang(229, $sa), $H);
                }
            } elseif (!is_string($oc = get_file("csv_file", true)))
                $n = upload_error($oc);
            elseif (!preg_match('~~u', $oc))
                $n = lang(231);
            else {
                cookie("adminer_import", "output=" . urlencode($ra["output"]) . "&format=" . urlencode($_POST["separator"]));
                $H  = true;
                $Ya = array_keys($p);
                preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~', $oc, $Bd);
                $sa = count($Bd[0]);
                begin();
                $Cf = ($_POST["separator"] == "csv" ? "," : ($_POST["separator"] == "tsv" ? "\t" : ";"));
                foreach ($Bd[0] as $x => $X) {
                    preg_match_all("~((?>\"[^\"]*\")+|[^$Cf]*)$Cf~", $X . $Cf, $Cd);
                    if (!$x && !array_diff($Cd[1], $Ya)) {
                        $Ya = $Cd[1];
                        $sa--;
                    } else {
                        $N = array();
                        foreach ($Cd[1] as $s => $Va)
                            $N[idf_escape($Ya[$s])] = ($Va == "" && $p[$Ya[$s]]["null"] ? "NULL" : q(str_replace('""', '"', preg_replace('~^"|"$~', '', $Va))));
                        $H = insert_update($a, $N, $Qe);
                        if (!$H)
                            break;
                    }
                }
                if ($H)
                    queries("COMMIT");
                queries_redirect(remove_from_uri("page"), lang(232, $sa), $H);
                queries("ROLLBACK");
            }
        }
    }
    $Yf = $b->tableName($Q);
    if (is_ajax())
        ob_start();
    page_header(lang(36) . ": $Yf", $n);
    $N = null;
    if (isset($qf["insert"])) {
        $N = "";
        foreach ((array) $_GET["where"] as $X) {
            if (count($vc[$X["col"]]) == 1 && ($X["op"] == "=" || (!$X["op"] && !ereg('[_%]', $X["val"]))))
                $N .= "&set" . urlencode("[" . bracket_escape($X["col"]) . "]") . "=" . urlencode($X["val"]);
        }
    }
    $b->selectLinks($Q, $N);
    if (!$g)
        echo "<p class='error'>" . lang(233) . ($p ? "." : ": " . error()) . "\n";
    else {
        echo "<form action='' id='form'>\n", "<div style='display: none;'>";
        hidden_fields_get();
        echo (DB != "" ? '<input type="hidden" name="db" value="' . h(DB) . '">' . (isset($_GET["ns"]) ? '<input type="hidden" name="ns" value="' . h($_GET["ns"]) . '">' : "") : "");
        echo '<input type="hidden" name="select" value="' . h($a) . '">', "</div>\n";
        $b->selectColumnsPrint($L, $g);
        $b->selectSearchPrint($Z, $g, $v);
        $b->selectOrderPrint($pe, $g, $v);
        $b->selectLimitPrint($y);
        $b->selectLengthPrint($kg);
        $b->selectActionPrint($v);
        echo "</form>\n";
        $D = $_GET["page"];
        if ($D == "last") {
            $yc = $i->result("SELECT COUNT(*) FROM " . table($a) . ($Z ? " WHERE " . implode(" AND ", $Z) : ""));
            $D  = floor(max(0, $yc - 1) / $y);
        }
        $G = $b->selectQueryBuild($L, $Z, $Fc, $pe, $y, $D);
        if (!$G)
            $G = "SELECT" . limit((+$y && $Fc && $cd && $w == "sql" ? "SQL_CALC_FOUND_ROWS " : "") . $_c, ($Z ? "\nWHERE " . implode(" AND ", $Z) : "") . $Gc, ($y != "" ? +$y : null), ($D ? $y * $D : 0), "\n");
        echo $b->selectQuery($G);
        $H = $i->query($G);
        if (!$H)
            echo "<p class='error'>" . error() . "\n";
        else {
            if ($w == "mssql" && $D)
                $H->seek($y * $D);
            $Qb = array();
            echo "<form action='' method='post' enctype='multipart/form-data'>\n";
            $K = array();
            while ($J = $H->fetch_assoc()) {
                if ($D && $w == "oracle")
                    unset($J["RNUM"]);
                $K[] = $J;
            }
            if ($_GET["page"] != "last")
                $yc = (+$y && $Fc && $cd ? ($w == "sql" ? $i->result(" SELECT FOUND_ROWS()") : $i->result("SELECT COUNT(*) FROM ($G) x")) : count($K));
            if (!$K)
                echo "<p class='message'>" . lang(89) . "\n";
            else {
                $Ea = $b->backwardKeys($a, $Yf);
                echo "<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n", "<thead><tr>" . (!$Fc && $L ? "" : "<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='" . h($_GET["modify"] ? remove_from_uri("modify") : $_SERVER["REQUEST_URI"] . "&modify=1") . "'>" . lang(234) . "</a>");
                $Ud = array();
                $Cc = array();
                reset($L);
                $bf = 1;
                foreach ($K[0] as $x => $X) {
                    if ($x != $be) {
                        $X = $_GET["columns"][key($L)];
                        $o = $p[$L ? ($X ? $X["col"] : current($L)) : $x];
                        $B = ($o ? $b->fieldName($o, $bf) : "*");
                        if ($B != "") {
                            $bf++;
                            $Ud[$x] = $B;
                            $f      = idf_escape($x);
                            $Nc     = remove_from_uri('(order|desc)[^=]*|page') . '&order%5B0%5D=' . urlencode($x);
                            $xb     = "&desc%5B0%5D=1";
                            echo '<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">', '<a href="' . h($Nc . ($pe[0] == $f || $pe[0] == $x || (!$pe && $cd && $Fc[0] == $f) ? $xb : '')) . '">';
                            echo (!$L || $X ? apply_sql_function($X["fun"], $B) : h(current($L))) . "</a>";
                            echo "<span class='column hidden'>", "<a href='" . h($Nc . $xb) . "' title='" . lang(42) . "' class='text'> ↓</a>";
                            if (!$X["fun"])
                                echo '<a href="#fieldset-search" onclick="selectSearch(\'' . h(js_escape($x)) . '\'); return false;" title="' . lang(39) . '" class="text jsonly"> =</a>';
                            echo "</span>";
                        }
                        $Cc[$x] = $X["fun"];
                        next($L);
                    }
                }
                $wd = array();
                if ($_GET["modify"]) {
                    foreach ($K as $J) {
                        foreach ($J as $x => $X)
                            $wd[$x] = max($wd[$x], min(40, strlen(utf8_decode($X))));
                    }
                }
                echo ($Ea ? "<th>" . lang(235) : "") . "</thead>\n";
                if (is_ajax()) {
                    if ($y % 2 == 1 && $D % 2 == 1)
                        odd();
                    ob_end_clean();
                }
                foreach ($b->rowDescriptions($K, $vc) as $Td => $J) {
                    $Gg = unique_array($K[$Td], $v);
                    if (!$Gg) {
                        $Gg = array();
                        foreach ($K[$Td] as $x => $X) {
                            if (!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~', $x))
                                $Gg[$x] = $X;
                        }
                    }
                    $Hg = "";
                    foreach ($Gg as $x => $X) {
                        if (strlen($X) > 64) {
                            $x = "MD5(" . (strpos($x, '(') ? $x : idf_escape($x)) . ")";
                            $X = md5($X);
                        }
                        $Hg .= "&" . ($X !== null ? urlencode("where[" . bracket_escape($x) . "]") . "=" . urlencode($X) : "null%5B%5D=" . urlencode($x));
                    }
                    echo "<tr" . odd() . ">" . (!$Fc && $L ? "" : "<td>" . checkbox("check[]", substr($Hg, 1), in_array(substr($Hg, 1), (array) $_POST["check"]), "", "this.form['all'].checked = false; formUncheck('all-page');") . ($cd || information_schema(DB) ? "" : " <a href='" . h(ME . "edit=" . urlencode($a) . $Hg) . "'>" . lang(234) . "</a>"));
                    foreach ($J as $x => $X) {
                        if (isset($Ud[$x])) {
                            $o = $p[$x];
                            if ($X != "" && (!isset($Qb[$x]) || $Qb[$x] != ""))
                                $Qb[$x] = (is_mail($X) ? $Ud[$x] : "");
                            $z = "";
                            $X = $b->editVal($X, $o);
                            if ($X !== null) {
                                if (ereg('blob|bytea|raw|file', $o["type"]) && $X != "")
                                    $z = ME . 'download=' . urlencode($a) . '&field=' . urlencode($x) . $Hg;
                                if ($X === "")
                                    $X = "&nbsp;";
                                elseif ($kg != "" && is_shortable($o))
                                    $X = shorten_utf8($X, max(0, +$kg));
                                else
                                    $X = h($X);
                                if (!$z) {
                                    foreach ((array) $vc[$x] as $q) {
                                        if (count($vc[$x]) == 1 || end($q["source"]) == $x) {
                                            $z = "";
                                            foreach ($q["source"] as $s => $If)
                                                $z .= where_link($s, $q["target"][$s], $K[$Td][$If]);
                                            $z = ($q["db"] != "" ? preg_replace('~([?&]db=)[^&]+~', '\\1' . urlencode($q["db"]), ME) : ME) . 'select=' . urlencode($q["table"]) . $z;
                                            if (count($q["source"]) == 1)
                                                break;
                                        }
                                    }
                                }
                                if ($x == "COUNT(*)") {
                                    $z = ME . "select=" . urlencode($a);
                                    $s = 0;
                                    foreach ((array) $_GET["where"] as $W) {
                                        if (!array_key_exists($W["col"], $Gg))
                                            $z .= where_link($s++, $W["col"], $W["val"], $W["op"]);
                                    }
                                    foreach ($Gg as $hd => $W)
                                        $z .= where_link($s++, $hd, $W);
                                }
                            }
                            if (!$z && ($z = $b->selectLink($J[$x], $o)) === null) {
                                if (is_mail($J[$x]))
                                    $z = "mailto:$J[$x]";
                                if ($Ye = is_url($J[$x]))
                                    $z = ($Ye == "http" && $ba ? $J[$x] : "$Ye://www.adminer.org/redirect/?url=" . urlencode($J[$x]));
                            }
                            $Oc = h("val[$Hg][" . bracket_escape($x) . "]");
                            $Y  = $_POST["val"][$Hg][bracket_escape($x)];
                            $Ic = h($Y !== null ? $Y : $J[$x]);
                            $_d = strpos($X, "<i>...</i>");
                            $Mb = is_utf8($X) && $K[$Td][$x] == $J[$x] && !$Cc[$x];
                            $jg = ereg('text|lob', $o["type"]);
                            echo (($_GET["modify"] && $Mb) || $Y !== null ? "<td>" . ($jg ? "<textarea name='$Oc' cols='30' rows='" . (substr_count($J[$x], "\n") + 1) . "'>$Ic</textarea>" : "<input name='$Oc' value='$Ic' size='$wd[$x]'>") : "<td id='$Oc' onclick=\"selectClick(this, event, " . ($_d ? 2 : ($jg ? 1 : 0)) . ($Mb ? "" : ", '" . h(lang(236)) . "'") . ");\">" . $b->selectVal($X, $z, $o));
                        }
                    }
                    if ($Ea)
                        echo "<td>";
                    $b->backwardKeysPrint($Ea, $K[$Td]);
                    echo "</tr>\n";
                }
                if (is_ajax())
                    exit;
                echo "</table>\n", (!$Fc && $L ? "" : "<script type='text/javascript'>tableCheck();</script>\n");
            }
            if (($K || $D) && !is_ajax()) {
                $ac = true;
                if ($_GET["page"] != "last" && +$y && !$cd && ($yc >= $y || $D)) {
                    $yc = found_rows($Q, $Z);
                    if ($yc < max(1e4, 2 * ($D + 1) * $y))
                        $yc = reset(slow_query("SELECT COUNT(*) FROM " . table($a) . ($Z ? " WHERE " . implode(" AND ", $Z) : "")));
                    else
                        $ac = false;
                }
                if (+$y && ($yc === false || $yc > $y || $D)) {
                    echo "<p class='pages'>";
                    $Ed = ($yc === false ? $D + (count($K) >= $y ? 2 : 1) : floor(($yc - 1) / $y));
                    echo '<a href="' . h(remove_from_uri("page")) . "\" onclick=\"pageClick(this.href, +prompt('" . lang(237) . "', '" . ($D + 1) . "'), event); return false;\">" . lang(237) . "</a>:", pagination(0, $D) . ($D > 5 ? " ..." : "");
                    for ($s = max(1, $D - 4); $s < min($Ed, $D + 5); $s++)
                        echo pagination($s, $D);
                    if ($Ed > 0) {
                        echo ($D + 5 < $Ed ? " ..." : ""), ($ac && $yc !== false ? pagination($Ed, $D) : " <a href='" . h(remove_from_uri("page") . "&page=last") . "' title='~$Ed'>" . lang(238) . "</a>");
                    }
                    echo (($yc === false ? count($K) + 1 : $yc - $D * $y) > $y ? ' <a href="' . h(remove_from_uri("page") . "&page=" . ($D + 1)) . '" onclick="return !selectLoadMore(this, ' . (+$y) . ', \'' . lang(239) . '\');">' . lang(240) . '</a>' : '');
                }
                echo "<p>\n", ($yc !== false ? "(" . ($ac ? "" : "~ ") . lang(126, $yc) . ") " : ""), checkbox("all", 1, 0, lang(241)) . "\n";
                if ($b->selectCommandPrint()) {
                    echo '<fieldset><legend>', lang(34), '</legend><div>
<input type="submit" value="', lang(145), '"', ($_GET["modify"] ? '' : ' title="' . lang(230) . '" class="jsonly"'), '>
<input type="submit" name="edit" value="', lang(34), '">
<input type="submit" name="clone" value="', lang(226), '">
<input type="submit" name="delete" value="', lang(148), '" onclick="return confirm(\'', lang(0);
?> (' + (this.form['all'].checked ? <?php
                    echo $yc, ' : formChecked(this, /check/)) + \')\');">
</div></fieldset>
';
                }
                $wc = $b->dumpFormat();
                foreach ((array) $_GET["columns"] as $f) {
                    if ($f["fun"]) {
                        unset($wc['sql']);
                        break;
                    }
                }
                if ($wc) {
                    print_fieldset("export", lang(118));
                    $ye = $b->dumpOutput();
                    echo ($ye ? html_select("output", $ye, $ra["output"]) . " " : ""), html_select("format", $wc, $ra["format"]), " <input type='submit' name='export' value='" . lang(118) . "'>\n", "</div></fieldset>\n";
                }
            }
            if ($b->selectImportPrint()) {
                print_fieldset("import", lang(55), !$K);
                echo "<input type='file' name='csv_file'> ", html_select("separator", array(
                    "csv" => "CSV,",
                    "csv;" => "CSV;",
                    "tsv" => "TSV"
                ), $ra["format"], 1);
                echo " <input type='submit' name='import' value='" . lang(55) . "'>", "</div></fieldset>\n";
            }
            $b->selectEmailPrint(array_filter($Qb, 'strlen'), $g);
            echo "<p><input type='hidden' name='token' value='$S'></p>\n", "</form>\n";
        }
    }
    if (is_ajax()) {
        ob_end_clean();
        exit;
    }
} elseif (isset($_GET["variables"])) {
    $Nf = isset($_GET["status"]);
    page_header($Nf ? lang(80) : lang(79));
    $Tg = ($Nf ? show_status() : show_variables());
    if (!$Tg)
        echo "<p class='message'>" . lang(89) . "\n";
    else {
        echo "<table cellspacing='0'>\n";
        foreach ($Tg as $x => $X) {
            echo "<tr>", "<th><code class='jush-" . $w . ($Nf ? "status" : "set") . "'>" . h($x) . "</code>", "<td>" . nbsp($X);
        }
        echo "</table>\n";
    }
} elseif (isset($_GET["script"])) {
    header("Content-Type: text/javascript; charset=utf-8");
    if ($_GET["script"] == "db") {
        $Vf = array(
            "Data_length" => 0,
            "Index_length" => 0,
            "Data_free" => 0
        );
        foreach (table_status() as $B => $Q) {
            $Oc = js_escape($B);
            json_row("Comment-$Oc", nbsp($Q["Comment"]));
            if (!is_view($Q)) {
                foreach (array(
                    "Engine",
                    "Collation"
                ) as $x)
                    json_row("$x-$Oc", nbsp($Q[$x]));
                foreach ($Vf + array(
                    "Auto_increment" => 0,
                    "Rows" => 0
                ) as $x => $X) {
                    if ($Q[$x] != "") {
                        $X = number_format($Q[$x], 0, '.', lang(8));
                        json_row("$x-$Oc", ($x == "Rows" && $X && $Q["Engine"] == ($Kf == "pgsql" ? "table" : "InnoDB") ? "~ $X" : $X));
                        if (isset($Vf[$x]))
                            $Vf[$x] += ($Q["Engine"] != "InnoDB" || $x != "Data_free" ? $Q[$x] : 0);
                    } elseif (array_key_exists($x, $Q))
                        json_row("$x-$Oc");
                }
            }
        }
        foreach ($Vf as $x => $X)
            json_row("sum-$x", number_format($X, 0, '.', lang(8)));
        json_row("");
    } elseif ($_GET["script"] == "kill")
        $i->query("KILL " . (+$_POST["kill"]));
    else {
        foreach (count_tables($b->databases()) as $m => $X)
            json_row("tables-" . js_escape($m), $X);
        json_row("");
    }
    exit;
} else {
    $eg = array_merge((array) $_POST["tables"], (array) $_POST["views"]);
    if ($eg && !$n && !$_POST["search"]) {
        $H  = true;
        $Jd = "";
        if ($w == "sql" && count($_POST["tables"]) > 1 && ($_POST["drop"] || $_POST["truncate"] || $_POST["copy"]))
            queries("SET foreign_key_checks = 0");
        if ($_POST["truncate"]) {
            if ($_POST["tables"])
                $H = truncate_tables($_POST["tables"]);
            $Jd = lang(242);
        } elseif ($_POST["move"]) {
            $H  = move_tables((array) $_POST["tables"], (array) $_POST["views"], $_POST["target"]);
            $Jd = lang(243);
        } elseif ($_POST["copy"]) {
            $H  = copy_tables((array) $_POST["tables"], (array) $_POST["views"], $_POST["target"]);
            $Jd = lang(244);
        } elseif ($_POST["drop"]) {
            if ($_POST["views"])
                $H = drop_views($_POST["views"]);
            if ($H && $_POST["tables"])
                $H = drop_tables($_POST["tables"]);
            $Jd = lang(245);
        } elseif ($w != "sql") {
            $H  = ($w == "sqlite" ? queries("VACUUM") : apply_queries("VACUUM" . ($_POST["optimize"] ? "" : " ANALYZE"), $_POST["tables"]));
            $Jd = lang(246);
        } elseif (!$_POST["tables"])
            $Jd = lang(7);
        elseif ($H = queries(($_POST["optimize"] ? "OPTIMIZE" : ($_POST["check"] ? "CHECK" : ($_POST["repair"] ? "REPAIR" : "ANALYZE"))) . " TABLE " . implode(", ", array_map('idf_escape', $_POST["tables"])))) {
            while ($J = $H->fetch_assoc())
                $Jd .= "<b>" . h($J["Table"]) . "</b>: " . h($J["Msg_text"]) . "<br>";
        }
        queries_redirect(substr(ME, 0, -1), $Jd, $H);
    }
    page_header(($_GET["ns"] == "" ? lang(25) . ": " . h(DB) : lang(87) . ": " . h($_GET["ns"])), $n, true);
    if ($b->homepage()) {
        if ($_GET["ns"] !== "") {
            echo "<h3 id='tables-views'>" . lang(247) . "</h3>\n";
            $dg = tables_list();
            if (!$dg)
                echo "<p class='message'>" . lang(7) . "\n";
            else {
                echo "<form action='' method='post'>\n", "<p>" . lang(248) . ": <input type='search' name='query' value='" . h($_POST["query"]) . "'> <input type='submit' name='search' value='" . lang(39) . "'>\n";
                if ($_POST["search"] && $_POST["query"] != "")
                    search_tables();
                echo "<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n", '<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">', '<th>' . lang(107), '<td>' . lang(249), '<td>' . lang(84), '<td>' . lang(250), '<td>' . lang(251), '<td>' . lang(252), '<td>' . lang(99), '<td>' . lang(253), (support("comment") ? '<td>' . lang(101) : ''), "</thead>\n";
                foreach ($dg as $B => $T) {
                    $Vg = ($T !== null && !eregi("table", $T));
                    echo '<tr' . odd() . '><td>' . checkbox(($Vg ? "views[]" : "tables[]"), $B, in_array($B, $eg, true), "", "formUncheck('check-all');"), '<th><a href="' . h(ME) . 'table=' . urlencode($B) . '" title="' . lang(29) . '">' . h($B) . '</a>';
                    if ($Vg) {
                        echo '<td colspan="6"><a href="' . h(ME) . "view=" . urlencode($B) . '" title="' . lang(30) . '">' . lang(106) . '</a>', '<td align="right"><a href="' . h(ME) . "select=" . urlencode($B) . '" title="' . lang(28) . '">?</a>';
                    } else {
                        foreach (array(
                            "Engine" => array(),
                            "Collation" => array(),
                            "Data_length" => array(
                                "create",
                                lang(31)
                            ),
                            "Index_length" => array(
                                "indexes",
                                lang(110)
                            ),
                            "Data_free" => array(
                                "edit",
                                lang(32)
                            ),
                            "Auto_increment" => array(
                                "auto_increment=1&create",
                                lang(31)
                            ),
                            "Rows" => array(
                                "select",
                                lang(28)
                            )
                        ) as $x => $z)
                            echo ($z ? "<td align='right'><a href='" . h(ME . "$z[0]=") . urlencode($B) . "' id='$x-" . h($B) . "' title='$z[1]'>?</a>" : "<td id='$x-" . h($B) . "'>&nbsp;");
                    }
                    echo (support("comment") ? "<td id='Comment-" . h($B) . "'>&nbsp;" : "");
                }
                echo "<tr><td>&nbsp;<th>" . lang(227, count($dg)), "<td>" . nbsp($w == "sql" ? $i->result("SELECT @@storage_engine") : ""), "<td>" . nbsp(db_collation(DB, collations()));
                foreach (array(
                    "Data_length",
                    "Index_length",
                    "Data_free"
                ) as $x)
                    echo "<td align='right' id='sum-$x'>&nbsp;";
                echo "</table>\n", "<script type='text/javascript'>tableCheck();</script>\n";
                if (!information_schema(DB)) {
                    echo "<p>" . (ereg('^(sql|sqlite|pgsql)$', $w) ? ($w != "sqlite" ? "<input type='submit' value='" . lang(254) . "'> " : "") . "<input type='submit' name='optimize' value='" . lang(255) . "'> " : "") . ($w == "sql" ? "<input type='submit' name='check' value='" . lang(256) . "'> <input type='submit' name='repair' value='" . lang(257) . "'> " : "") . "<input type='submit' name='truncate' value='" . lang(258) . "'" . confirm("formChecked(this, /tables/)") . "> <input type='submit' name='drop' value='" . lang(86) . "'" . confirm("formChecked(this, /tables|views/)") . ">\n";
                    $l = (support("scheme") ? schemas() : $b->databases());
                    if (count($l) != 1 && $w != "sqlite") {
                        $m = (isset($_POST["target"]) ? $_POST["target"] : (support("scheme") ? $_GET["ns"] : DB));
                        echo "<p>" . lang(259) . ": ", ($l ? html_select("target", $l, $m) : '<input name="target" value="' . h($m) . '" autocapitalize="off">'), " <input type='submit' name='move' value='" . lang(260) . "'>", (support("copy") ? " <input type='submit' name='copy' value='" . lang(261) . "'>" : ""), "\n";
                    }
                    echo "<input type='hidden' name='token' value='$S'>\n";
                }
                echo "</form>\n";
            }
            echo '<p><a href="' . h(ME) . 'create=">' . lang(152) . "</a>\n";
            if (support("view"))
                echo '<a href="' . h(ME) . 'view=">' . lang(184) . "</a>\n";
            if (support("routine")) {
                echo "<h3 id='routines'>" . lang(121) . "</h3>\n";
                $uf = routines();
                if ($uf) {
                    echo "<table cellspacing='0'>\n", '<thead><tr><th>' . lang(162) . '<td>' . lang(96) . '<td>' . lang(201) . "<td>&nbsp;</thead>\n";
                    odd('');
                    foreach ($uf as $J) {
                        echo '<tr' . odd() . '>', '<th><a href="' . h(ME) . ($J["ROUTINE_TYPE"] != "PROCEDURE" ? 'callf=' : 'call=') . urlencode($J["ROUTINE_NAME"]) . '">' . h($J["ROUTINE_NAME"]) . '</a>', '<td>' . h($J["ROUTINE_TYPE"]), '<td>' . h($J["DTD_IDENTIFIER"]), '<td><a href="' . h(ME) . ($J["ROUTINE_TYPE"] != "PROCEDURE" ? 'function=' : 'procedure=') . urlencode($J["ROUTINE_NAME"]) . '">' . lang(113) . "</a>";
                    }
                    echo "</table>\n";
                }
                echo '<p>' . (support("procedure") ? '<a href="' . h(ME) . 'procedure=">' . lang(200) . '</a> ' : '') . '<a href="' . h(ME) . 'function=">' . lang(199) . "</a>\n";
            }
            if (support("sequence")) {
                echo "<h3 id='sequences'>" . lang(262) . "</h3>\n";
                $Df = get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema()");
                if ($Df) {
                    echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(162) . "</thead>\n";
                    odd('');
                    foreach ($Df as $X)
                        echo "<tr" . odd() . "><th><a href='" . h(ME) . "sequence=" . urlencode($X) . "'>" . h($X) . "</a>\n";
                    echo "</table>\n";
                }
                echo "<p><a href='" . h(ME) . "sequence='>" . lang(206) . "</a>\n";
            }
            if (support("type")) {
                echo "<h3 id='user-types'>" . lang(13) . "</h3>\n";
                $Pg = types();
                if ($Pg) {
                    echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(162) . "</thead>\n";
                    odd('');
                    foreach ($Pg as $X)
                        echo "<tr" . odd() . "><th><a href='" . h(ME) . "type=" . urlencode($X) . "'>" . h($X) . "</a>\n";
                    echo "</table>\n";
                }
                echo "<p><a href='" . h(ME) . "type='>" . lang(210) . "</a>\n";
            }
            if (support("event")) {
                echo "<h3 id='events'>" . lang(122) . "</h3>\n";
                $K = get_rows("SHOW EVENTS");
                if ($K) {
                    echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(162) . "<td>" . lang(263) . "<td>" . lang(190) . "<td>" . lang(191) . "<td></thead>\n";
                    foreach ($K as $J) {
                        echo "<tr>", "<th>" . h($J["Name"]), "<td>" . ($J["Execute at"] ? lang(264) . "<td>" . $J["Execute at"] : lang(192) . " " . $J["Interval value"] . " " . $J["Interval field"] . "<td>$J[Starts]"), "<td>$J[Ends]", '<td><a href="' . h(ME) . 'event=' . urlencode($J["Name"]) . '">' . lang(113) . '</a>';
                    }
                    echo "</table>\n";
                    $Zb = $i->result("SELECT @@event_scheduler");
                    if ($Zb && $Zb != "ON")
                        echo "<p class='error'><code class='jush-sqlset'>event_scheduler</code>: " . h($Zb) . "\n";
                }
                echo '<p><a href="' . h(ME) . 'event=">' . lang(189) . "</a>\n";
            }
            if ($dg)
                echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=db');</script>\n";
        }
    }
}
page_footer();
