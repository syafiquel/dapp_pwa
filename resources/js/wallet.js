import { chain, configureChains, createClient } from '@wagmi/core'
import { ClientCtrl, ConfigCtrl } from '@web3modal/core'
import { EthereumClient, modalConnectors, walletConnectProvider } from '@web3modal/ethereum'

// 1. Define constants
const projectId = '1a9d88a1bcc1c63302e3b07b873ccdc1'
const chains = [chain.mainnet, chain.polygonMumbai]

// 2. Configure wagmi client
const { provider } = configureChains(chains, [walletConnectProvider({ projectId })])
const wagmiClient = createClient({
  autoConnect: true,
  connectors: modalConnectors({ appName: 'web3Modal', chains }),
  provider
})

// 3. Configure ethereum client
const ethereumClient = new EthereumClient(wagmiClient, chains)

// 4. Configure modal and pass ethereum client to it
ConfigCtrl.setConfig({
  projectId,
  themeMode: 'dark',
  themeColor: 'default'
})
ClientCtrl.setEthereumClient(ethereumClient, chains)

// 5. Import ui package after all configuration has been completed
import('@web3modal/ui')

/**
 * 6. Use ModalCtrl and wagmiClient in your app i.e.
 *
 * ModalCtrl.open
 *
 * wagmiClient.getAccount
 * wagmiClient.watchAccount
 *
 * etc ...
 */